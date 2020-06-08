<?php 
namespace App\Http\Controllers;

use View; 
use Auth;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Category;
use App\Models\Products;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\banner;
use App\Models\about_us;
use Cache;
use Hash;
use Mail;

class FrontendController extends Controller
{

    public function getDataHome(cart $cart) {  
         
        $products = Products::orderBy('updated_at','DESC')->limit(6)->get();
        $newFirst = News::orderBy('created_at','DESC')->take(1)->get();
        $newSecond = News::orderBy('created_at','DESC')->skip(1)->take(1)->get();
        $listNews = News::orderBy('created_at','DESC')->skip(2)->take(3)->get();
        $banner = banner::first();
        $aboutUs = about_us::first();

        return view('frontend.index',[
            'products' =>$products,
            'cart' =>$cart,
            'newFirst' => $newFirst,
            'newSecond' => $newSecond,
            'listNews' => $listNews,
            'banner' => $banner,
            'aboutUs' => $aboutUs
        ]);
    }


     //chi-tiet-bai-viet

    public function getDetailNews($slug, cart $cart) {

        $news = News::where('slug', $slug)->first();

        $bloglike = News::orderBy('created_at','DESC')
                    ->where('id','<>',$news->id)
                    ->limit(4)->get();

        return view('frontend.detailblog',[
            'news'=>$news,
            'cart'=>$cart,
            'bloglike' => $bloglike

        ]);
    }


     //danh-sach-bai-viet

    public function getListNews(cart $cart) {

        $news = News::orderBy('updated_at','DESC')->get();

        return view('frontend.blog',[
            'news'=>$news,
            'cart'=>$cart

        ]);
    }


    public function getMenu(cart $cart) {

        $cat = category::get();

        return view('frontend.menu',[
            'cart'=>$cart,
            'cat'=>$cat
        ]);
    }
    

     public function changePassword(cart $cart) {

        return view('frontend.change-password',[
            'cart'=>$cart

        ]);
    }

    public function updatePassword(Request $request, $id) {

         $model = user::find($id);
         $this->validate($request,[
             'oldPassword'=>'required',
             'newPassword'=> 'required|min:6|max:50',
             'confirmPassword' => 'same:newPassword',
            
        ],
        [
            'oldPassword.required'=> 'Chưa nhập mật khẩu cũ',
            'newPassword.required'=> 'Chưa nhập mật khẩu mới',
            'newPassword.min'=> 'Mật khẩu từ 6 đến 50 kí tự',
            'newPassword.max'=> 'Mật khẩu từ 6 đến 50 kí tự',
            'confirmPassword.same'=> 'Mật khẩu xác nhận phải trùng khớp',
            
        ]);

        if(Hash::check($request->oldPassword, Auth::user()->password)) {
           
           if($request->newPassword == $request->confirmPassword) {
               $user = User::find(Auth::user()->id);
               $user->password = bcrypt($request->newPassword);
               $user->save();
               Auth::logout();
               return redirect()->route('login')->with('success','Đổi mật khẩu thành công, Vui lòng đăng nhập lại!');
           } 

           else {

               return redirect()->back()->with('error','Mật khẩu xác nhận phải trùng khớp');
           }

       }

       else {

           return redirect()->back()->with('error','Mật khẩu cũ không chính xác');
       }
    }

    public function editProfile(Cart $cart, $id) {

        return view('frontend.edit-profile',[
            'cart' =>$cart,
            'model' => user::find($id),
        ]);
    }

    public function updateProfile(Request $request, $id) {

         $model = user::find($id);
         $this->validate($request,[
            'full_name' => 'required|min:3|max:50',
            'address' => 'required|max:50',
            'phone' => 'required|max:15',
            'email' => 'required',
            'oldPassword'=>'required',
            
        ],
        [
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 30 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 30 kí tự',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'address.max'=> 'Địa chỉ bạn nhập quá dài',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'email.required'=> 'Bạn phải nhập email',
            'phone.max'=> 'Số điện thoại không quá 11 số',
            'oldPassword.required'=> 'Bạn chưa nhập password',
            
        ]);

        if(Hash::check($request->oldPassword, Auth::user()->password)) { 

            if($model->update([
                'full_name'=>$request->full_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email' => $request->email

            ])) {

                return redirect()->route('profile')->with('success','Thay đổi thông tin thành công');

            }

            else {

                return redirect()->back()->with('error','Thay đổi thông tin chưa thành công. Vui lòng thực hiện lại');
            }
        }
        
        else {

           return redirect()->back()->with('error','Mật khẩu cũ không chính xác');
       }
    }


    public function activeUser(cart $cart) {

        return view('frontend.active-user',[
            'cart'=>$cart

        ]);
    }

    public function postActiveUser($id, Request $request) {   

        $user = user::find($id);
        
        if(is_string($request->active_code) == is_string($user->code_active)) {

            if($user->update([
            'status'=> 1,
            ])) {
                return redirect()->route('login')->with('success','Chúc mừng bạn kích hoạt thành công!');

            } else {
                 return redirect()->back()->with('error','Kích hoạt chưa thành công, vui lòng thực hiện lại!');
            };

        } else {
            return redirect()->back()->with('error','Sai mã kích hoạt vui lòng kiểm tra lại!');
        }; 
    }

     //danh-muc-san-pham

    public function getCategory($slug,cart $cart) { 

        $category = Category::where('slug', $slug)->first();
        $product = Products::join('category','products.cat_id','=','category.id')
                            ->where('category.slug','=',$slug)
                            ->select('products.*')->get();
      
        return view('frontend.category',[
            'product'=>$product,
            'category'=>$category,
            'cart'=>$cart
        ]);
    }


     //chi-tiet-san-pham

    public function getDetailProduct($slug, cart $cart) {

        $pro = products::join('category','products.cat_id','=','category.id')
                        ->where('products.slug', $slug)
                        ->select('products.*','category.name as category_name',
                                'category.slug as category_slug')
                        ->first();

        $productslike = Products::where('cat_id',$pro->cat_id)
                                ->where('id','<>',$pro->id)
                                ->limit(3)->get();

        return view('frontend.detailproduct',[
            'pro'=> $pro,
            'cart'=> $cart,
            'productslike' => $productslike,
        ]);
    }
     
    
     //trang-dang-ki

    public function registration( cart $cart) {

        return view('frontend.registration',[
            'cart'=>$cart

        ]);
    }

     public function postRegistration(Request $request) {
        $aboutUs = about_us::first();
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    
        $this->request = $request;

        $this->validate($request,[
            'username'=> 'required|min:3|max:30|unique:user,username',
            'password'=> 'required|min:3|max:16',
            'password_rp' => 'same:password',
            'full_name' => 'required|min:3|max:50',
            'email' => 'required|unique:user,email',
            'address' => 'required',
            'phone' => 'required|max:11'
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 30  kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 16  kí tự',
            'username.unique'=> 'Tài khoản đã tồn tại',
            'password.required'=> 'Chưa nhập mật khẩu',
            'password.min'=> 'Mật khẩu từ 3 đến 16 kí tự',
            'password.max'=> 'Mật khẩu từ 3 đến 16  kí tự',
            'password_rp.same'=> 'Nhập lại mật khẩu không đúng',
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 50 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 50 kí tự',
            'email.required'=> 'Bạn phải nhập email',
            'email.unique'=> 'Email đã tồn tại đăng kí',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'phone.max'=> 'Số điện thoại không được quá 11 số',
        ]);
        if(User::Create([
            'username'=>$request->username,           
            'password'=>bcrypt($request->password),
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'status'=>0,
            'type'=>1,
            'code_active'=>$randomString,

        ])) {

        $user = user::where('username',$request->username)->first();


        Mail::send('mail.mail-active-user', array('user'=>$this->request,
                    'code'=> $randomString,
                    'aboutUs'=>$aboutUs,
                    'id'=>$user->id), function($message) {
                $message->to($this->request->email, $this->request->full_name)->subject('Kích hoạt tài khoản thành viên - THE COFFEE!');
        });

        return redirect()->route('login')->with('success','Bạn vui lòng kiểm tra email để kích hoạt tài khoản');

        } else {
             return redirect()->back()->with('error','Đăng kí bị lỗi vui lòng đăng kí lại');
        }
    }
    

    //trang-dang-nhap

    public function login( cart $cart) {

        return view('frontend.login',[
            'cart'=>$cart

        ]);
    }

    public function getProfile(Cart $cart) {

        return view('frontend.profile',[
         'cart' =>$cart 
        ]);
    }

     
    //dang-nhap

    public function postLogin(Request $req) {

        $user = user::where('username', $req->username)->first();
         
         if($user->status) {

            $credentials = array('username'=>$req->username, 'password'=>$req->password);

            if(Auth::attempt($credentials)) {

                return redirect()->route('home')->with('success','Đăng nhập thành công!');
            } 

            else {

                return redirect()->route('login')->with('error','Vui lòng kiểm tra lại tài khoản hoặc mật khẩu!');
            }
            
        }  else {

                return redirect()->route('login')->with('error','Tài khoản của bạn chưa được đăng kí hoặc chưa kích hoạt!');
        }

    }


   //dang-xuat
    
    public function logout() {

        Auth::logout();
        return redirect()->route('home');
    }


    public function order(Cart $cart) {

        return view('frontend.order',[
         'cart' =>$cart 
        ]);
    }


    public function postOrder(Cart $cart, Request $request) {
            $this->cart = $cart;
            $this->request = $request;
            $aboutUs = about_us::first();

            $check_quanti = 0;

            if(!empty($cart->items)) {

                if ($check_quanti == 0) {

                if($order = Order::create([
                    'sum'=> $cart->total(),
                    'id_cus' => Auth::user()->id,
                    'type'=>1,
                    'note'=>$request->note,
                    'receiver_name'=>$request->receiver_name,
                    'receiver_phone'=>$request->receiver_phone,
                    'receiver_address'=>$request->receiver_address,
                    'status'=>'pending',
                ]))
                {
                    foreach($cart->items as $item){
                        Order_detail::create([
                            'order_id' =>$order->id,
                            'pro_id' =>$item['id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price']
                        ]);
                    }

                     
                    Mail::send('mail.mail-detail-order', array('name' => Auth::user()->full_name,
                        'receiver'=>$this->request,
                        'aboutUs'=>$aboutUs,
                        'cart'=>$this->cart), function($message) {
                    $message->to(Auth::user()->email, Auth::user()->full_name)->subject('Thông tin đơn hàng - THE COFFEE!');
                    });
        
                    session(['cart'=>[]]);

                    return redirect()->route('home')->with('success','Đặt hàng thành công! Vui lòng kiểm tra email của bạn');
                };
            }   
        }

        else {

            return redirect()->route('error')->with('message','Đặt hàng thất bại!Vui lòng thử lại');
        }
    }

    public function getHistoryOrder(Cart $cart) {

        $order = Order::where('id_cus',Auth::user()->id)
                        ->where('type', 1)
                        ->orderBy('created_at','DESC')
                        ->paginate(10);

        return view('frontend.history-order',[
           'cart' =>$cart,
           'order' =>$order
       ]);
    }

    public function addCart($id, Cart $cart) {

        $product = Products::find($id)->toArray();
        $cart->add($product,$product['price']);

        return redirect()->back()->with('success','Đã thêm vào giỏ hàng');
    }

    public function getViewCart(Cart $cart) {

        return view('frontend.view-cart',[
            'cart'=> $cart
        ]);
    }

    public function removeCart($id, Cart $cart) {

        $cart->remove($id);
        $pro = Products::find($id);

        return redirect()->route('view-cart')->with('success','Đã xóa '.$pro->name.' khỏi giỏ hàng');
    }

    public function clearCart(Cart $cart) {

        $cart->clear();

        return redirect()->route('view-cart')->with('success','Xóa giỏ hàng thành công');
    }

    public function error(Cart $cart) {

        return view('frontend.erro',[
            'cart'=> $cart
        ]);
    }

    public function updateCart(Cart $cart,Request $request) {

        $quantity = $request->quantity ? $request->quantity : 1;
        $price = $request->price ? $request->price : 1000;

        if($request->id) {

            $cart->update($request->id,$request->price,$quantity);

            return redirect()->route('view-cart',['s_id'=>$request->s_id])->with('success','Cập nhật thành công');
        }
    }
    
}

?>