<?php

namespace App\Http\Controllers\Backend;

use App\Models\order;
use App\Models\Category; 
use App\Models\Products;
use App\Models\User;
use App\Models\order_detail;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class orderController extends Controller
{
    
    public function index(Cart $cart) {
            
        $ordercomfirm = order::join('user','order.id_cus','=','user.id')
            ->select('order.*','user.full_name as user_name')
            ->where('order.status','confirmed')
            ->orderby('created_at','DESC')
            ->paginate(10);
        return View('order.index',[
            'ordercomfirm'=>$ordercomfirm
        ]);
    }
   

    public function getListOrderUnconfirm(Cart $cart) {
        
        $order = order::join('user','order.id_cus','=','user.id')
            ->select('order.*','user.full_name as user_name')
            ->where('order.status','pending')
            ->orderby('created_at','DESC')
            ->paginate(10);

        return View('order.order-comfirm',[
            'order'=>$order
        ]);    
    }
   

    public function create(Cart $cart, $s_id) {

        return view('order.create',[
            'cart'=>$cart,
            'user'=>user::find($s_id)
        ]);
    }


    public function addUser() {
        

        $users = user::where('type',2)->orderby('created_at','DESC')->paginate(10);

        return view('order.order-add-user',[
            'users'=>$users
        ]); 
    }


    public function addProduct($s_id,Cart $cart) {

        $s = User::find($s_id);
        $products = products::join('category','products.cat_id','=','category.id')
                            ->select('products.*','category.name as category_name')
                            ->orderBy('created_at','DESC')
                            ->paginate(10);


        return view('order.order-add-product',[
            'cart'=>$cart,
            'products'=>$products,
            's'=> $s
        ]);
    }

    public function searchProduct(Request $request,$s_id) {  

        $products = products::where('name','like','%'.$request->value.'%' )->paginate(10);
        $s = User::find($s_id);

        return view('order.order-add-product',[
            'products' => $products,
            's'=> $s

        ]);
    }

    public function store(Request $request,$s_id,Cart $cart) {

        $order = order::create([
            'sum'=>$request->sum,
            'id_cus'=>$request->s_id,
            'admin_id'=>$request->admin_id,
            'type'=>2,
            'status'=>'confirmed',
        ]);

        foreach($cart->items as $item){
            order_detail::create([
                'order_id'=> $order->id,
                'pro_id'=> $item['id'],
                'quantity'=> $item['quantity'],
                'price'=> $item['price']
            ]);

            // $pro = Products::find($item['id']);
            // $pro_quanti = $pro->quantity + $item['quantity'];
            // $pro->update([
            //     'quantity' => $pro_quanti,
            //     'status'=>'1'
            // ]);
        }

        session(['cart'=>[]]);

        return redirect()->route('backend.order')->with('success','Tạo hóa đơn thành công');
        
    }

    public function destroy($id) {
        
        order::destroy($id);

        return redirect()->route('backend.order')->with('success','Xóa thành công');
        
    }

    public function viewDetailOrder($id) {   

        $order_detail = order::where('order.id', $id)->join('user','order.id_cus','=','user.id')
                ->join('admins','order.admin_id','=','admins.id')
                ->select('order.*','admins.full_name as admin_name', 
                    'user.full_name as user_name',
                    'user.address as user_address',
                    'user.phone as user_phone')->first();

        $order = order::find($id);  
        
        return view('order.detail',[
            'order' => $order
        ]);
    }


    public function comfirmOrder($id, Request $request) {   

        $model = order::find($id);

        if($model->update([
            'status'=>'confirmed',
            'admin_id'=>$request->admin_id,

        ]))
        {
            return redirect()->route('backend.order')->with('success','Xác nhận thành công');

        }
        else {
             return redirect()->back()->with('error','Xác nhận bị lỗi vui lòng xác nhận lại');
        };
    }


    // tạo hóa đơn

    public function addOrder($id, Cart $cart,$s_id,$price) {

        $product = Products::find($id)->toArray();
        $cart->add($product,$price);

        return redirect()->route('backend.order-add-product',['s_id'=>$s_id])->with('success','Đã thêm vào đơn hàng');
    }

    public function removeOrder($id, Cart $cart,$s_id) {

        $cart->remove($id);
        $pro = Products::find($id);

        return redirect()->route('backend.order-reciept',['s_id'=>$s_id])->with('success','Đã xóa '.$pro->name.' khỏi đơn hàng');
    }

    public function clearOrder(Cart $cart,$cus_id) {

        $cart->clear();

        return redirect()->route('backend.home')->with('success','Hủy tạo hóa đơn thành công');
    }

    public function updateOrder(Cart $cart,Request $request) {

        $quantity = $request->quantity ? $request->quantity : 1;
        $price = $request->price ? $request->price : 1000;

        if($request->id) {
            $cart->update($request->id,$request->price,$quantity);

            return redirect()->route('backend.order-reciept',['s_id'=>$request->s_id])->with('success','Cập nhật thành công');
        }
    }

    public function reciept($s_id,Cart $cart) {

        $user = user::find($s_id);

        return view('order.reciept',[
            'cart'=>$cart,
            'user' => $user
        ]);
    }
}
