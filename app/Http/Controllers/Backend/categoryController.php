<?php

namespace App\Http\Controllers\Backend;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        return View('category.index',[
            'categories'=>$categories
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('category.create');
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50'

        ],[
            'name.required' => 'không được để trống',
            'name.max'=> 'Tên danh mục không được quá 50 kí tự',
        ]);

        if(category::create([
            'name' => $request->name,
            'slug' => $request->slug

        ])) {
            return redirect()->route('backend.category')->with('success','Thêm thành công'); 

        }
        else {
            return redirect()->back()->with('error','Thêm thất bại');
        }
    }

    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       
        return view('category.edit',[
            
            'model' => category::where('slug',$slug)->first()
            
        ]);
    }

     public function update(Request $request, $slug)
    {
        $model = category::where('slug',$slug)->first();
         $this->validate($request,[
            'name' => 'required|max:50',
            
        ],
        [
            'name.required'=> 'Bạn phải nhập tên danh mục',
            'name.max'=> 'Tên danh mục không được quá 50 kí tự',
            
        ]);

        if($model->update([
        
            'name'=>$request->name,
            'slug' => $request->slug
        

        ]))
        {
            return redirect()->route('backend.category')->with('success','Sửa danh mục thành công');

        }
        else {
            return redirect()->back()->with('error','Sửa bị lỗi vui lòng sửa lại');
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($slug)
    {
        category::destroy($slug);
        return redirect()->route('backend.category')->with('success','Xóa thành công');
    }
   
}
