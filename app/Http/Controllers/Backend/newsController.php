<?php

namespace App\Http\Controllers\Backend;

use App\Models\news;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        
        return View('news.index',[
            'news'=>$news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create',[ 
            'news' => News::all(), 
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => 'required|unique:news,title',
            'short_content'=> 'required',
            'images'=> 'required',
            'full'=>'required',
            

        ],[
            'title.required'=>' Chưa nhập title',
            'title.unique'=>'title đã tồn tại',
            'short_content.required'=>'Vui lòng mở đầu cho blog',
            'images.required'=>'Vui lòng chọn ảnh cho blog',
            'full.required'=>'Vui lòng nhập bài viết cho blog',
            
        ]);

        $img_name = $request->file('images')->getClientOriginalName();
        $request->file('images')->move('public/images/',$img_name);

        if(news::create([
            'title'=> $request->title,
            'slug'=>$request->slug,
            'short_content'=>$request->short_content,
            'images'=>$img_name,
            'admin_id'=>$request->admin_id,
            'full'=>$request->full,
           
        ])) {
            return redirect()->route('backend.news')->with('success','Thêm bài viết thành công');
        }

        else {
            return redirect()->back()->with('error','Thêm thất bại');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */

    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        return view('news.edit',[
            'model' => news::find($id)
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = news::find($id);
        $this->validate($request,[
            'title' => 'required',
            'short_content'=> 'required',
            'images'=> 'required',
            'full'=>'required',
            

        ],[
            'title.required'=>' Chưa nhập title',
            'short_content.required'=>'Vui lòng mở đầu cho blog',
            'images.required'=>'Vui lòng chọn ảnh cho blog',
            'full.required'=>'Vui lòng nhập bài viết cho blog',
            
        ]);

        $img_name = $request->file('images')->getClientOriginalName();
        $request->file('images')->move('public/images/',$img_name);

        if($model->update([
            'title'=> $request->title,
            'slug'=>$request->slug,
            'short_content'=>$request->short_content,
            'images'=>$img_name,
            'full'=>$request->full,
          
        ])) {

            return redirect()->route('backend.news')->with('success', ' Sửa  blog thành công');
        }

        else {

            return redirect()->back()->with('error','Sửa thất bại');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        news::destroy($id);

        return redirect()->route('backend.news')->with('success','Xóa thành công');
    }
}
