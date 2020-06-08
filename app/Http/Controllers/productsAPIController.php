<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productsAPIController extends Controller
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
                            ->orderBy('created_at','DESC')->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

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

    public function store(request $request) {

        $this->validate($request,[
            'name' => 'required|unique:products,name',
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
        if(products::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'slug'=>$request->slug,
            'image'=>$img_name,
            'review'=>$request->review,
            'promo'=>$request->promo,
            'cat_id' => $request->cat_id,
        ])){
            return 1;
        }
        else{
        return 0;
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */

   public function getByID($id) {

        $products = products::find($id);
        return $products; 
    }

    public function edit($id) {  

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
    public function update(Request $request, $id) {

        $model = products::find($id);
        $this->validate($request,[
            'name' => 'required|unique:products,name',
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
        ])){
            return 1;
        }
        else{
        return 0;
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {

        products::destroy($id);
        return 1;
    }

    public function search(Request $request) { 
      
        $products = products::where('name','like','%'.$request->value.'%' )->paginate(4);

        return view('products.search',[
            'products' => $products

        ]);
    }
}
