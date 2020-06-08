<?php

namespace App\Http\Controllers\Backend;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::join('category','products.cat_id','=','category.id')
                            ->select('products.*','category.name as category_name')
                            ->orderBy('created_at','DESC')
                            ->paginate(10);

        return View('products.index',[
            'products'=>$products
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('products.create',[ 
            'products' => Products::all(), 
            'cats'=>Category::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }
    public function store(request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:products,name',
            'price'=> 'required',
            'image'=> 'required',
            'review'=>'required',
            'promo' =>'required|max:50'
            

        ],[
            'name.required'=>' Chưa nhập tên sản phẩm',
            'name.unique'=>'Sản phẩm đã tồn tại',
            'name.max'=> 'Tên sản phẩm không được quá 50 kí tự',
            'price.required'=>'Vui lòng nhập giá sản phẩm',
            'image.required'=>'Vui lòng chọn ảnh cho sản phẩm',
            'review.required'=>'Vui lòng nhập mô tả về sản phẩm',
            'promo.required'=>'Vui lòng nhập quảng cáo về sản phẩm',
            'promo.max'=> 'Tiêu đề quảng cáo không được quá 50 kí tự',
        ]);

        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('public/images/',$img_name);

        if(products::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'slug'=>$request->slug,
            'image'=>$img_name,
            'review'=>$request->review,
            'promo'=>$request->promo,
            'cat_id' => $request->cat_id,
        ])) {
            return redirect()->route('backend.products')->with('success','Thêm sản phẩm thành công');
        }

        else {
            return redirect()->back()->with('success','Thêm thất bại');
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */

    
    public function edit($id)
    {  
        return view('products.edit',[
            'model' => Products::find($id),
            'cats'=> Category::all()
        ]);   
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = products::find($id);
        $this->validate($request,[
            'name' => 'required',
            'price'=> 'required',
            'image'=> 'required',
            'review'=>'required',
            'promo' =>'required'
            

        ],[
            'name.required'=>' Chưa nhập tên sản phẩm',
            'name.unique'=>'Sản phẩm đã tồn tại',
            'price.required'=>'Vui lòng nhập giá sản phẩm',
            'image.required'=>'Vui lòng chọn ảnh cho sản phẩm',
            'review.required'=>'Vui lòng nhập mô tả về sản phẩm',
            'promo.required'=>'Vui lòng nhập quảng cáo về sản phẩm',
        ]);

        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('public/images/',$img_name);

        if($model->update([
            'name'=> $request->name,
            'price'=>$request->price,
            'slug'=>$request->slug,
            'image'=>$img_name,
            'review'=>$request->review,
            'promo'=>$request->promo,
            'cat_id' => $request->cat_id,
        ])) {
            return redirect()->route('backend.products')->with('success','Sửa sản phẩm thành công');
        }

        else {
            return redirect()->back()->with('success','Sửa thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::destroy($id);
        
        return redirect()->route('backend.products')->with('success','Xóa thành công');
    }

    public function search(Request $request)
    {   
        $products = products::where('name','like','%'.$request->value.'%' )->paginate(4);

        return view('products.search',[
            'products' => $products

        ]);
    }
}
