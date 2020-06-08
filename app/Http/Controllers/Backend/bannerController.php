<?php

namespace App\Http\Controllers\Backend;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class bannerController extends Controller
{
    
    public function index()
    {
        $banner = banner::first();
        return View('banner.index',[
            'banner'=>$banner
        ]);    
    }

    

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'descriptions' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',

        ],
        [
            'title.required'=> 'Bạn phải nhập tiêu đề',
            'descriptions.required'=> 'Bạn phải nhập nội dung',
            'image1.required'=> 'Bạn phải chọn ảnh thứ nhất',
            'image2.required'=> 'Bạn phải chọn ảnh thứ 2',
            'image3.required'=> 'Bạn phải chọn ảnh thứ 3',
            'image4.required'=> 'Bạn phải chọn ảnh thứ 4',

        ]);

        $img_name_1 = $request->file('image1')->getClientOriginalName();
        $img_name_2 = $request->file('image2')->getClientOriginalName();
        $img_name_3 = $request->file('image3')->getClientOriginalName();
        $img_name_4 = $request->file('image4')->getClientOriginalName();

        $request->file('image1')->move('public/images/',$img_name_1);
        $request->file('image2')->move('public/images/',$img_name_2);
        $request->file('image3')->move('public/images/',$img_name_3);
        $request->file('image4')->move('public/images/',$img_name_4);

        if(banner::create([
            'title'=>$request->title,
            'descriptions' => $request->descriptions,
            'image1' => $img_name_1,
            'image2' => $img_name_2,
            'image3' => $img_name_3,
            'image4' => $img_name_4

        ])) {

            return redirect()->route('backend.banner')->with('success','Thêm thành công'); 

        }

        else {

            return redirect()->back()->with('error','Thêm thất bại');
        }
    }

    
    public function edit($id)
    {
       
        return view('banner.edit',[
            
            'model' => banner::find($id)
            
        ]);
    }

     public function update(Request $request, $id)
    {
        $model = banner::where('id',$id)->first();

         $this->validate($request,[
            'title' => 'required',
            'descriptions' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
        ],
        [
            'title.required'=> 'Bạn phải nhập tiêu đề',
            'descriptions.required'=> 'Bạn phải nhập nội dung',
            'image1.required'=> 'Bạn phải chọn ảnh thứ nhất',
            'image2.required'=> 'Bạn phải chọn ảnh thứ 2',
            'image3.required'=> 'Bạn phải chọn ảnh thứ 3',
            'image4.required'=> 'Bạn phải chọn ảnh thứ 4',
            
        ]);

        $img_name_1 = $request->file('image1')->getClientOriginalName();
        $img_name_2 = $request->file('image2')->getClientOriginalName();
        $img_name_3 = $request->file('image3')->getClientOriginalName();
        $img_name_4 = $request->file('image4')->getClientOriginalName();

        $request->file('image1')->move('public/images/',$img_name_1);
        $request->file('image2')->move('public/images/',$img_name_2);
        $request->file('image3')->move('public/images/',$img_name_3);
        $request->file('image4')->move('public/images/',$img_name_4);

        if($model->update([

            'title'=>$request->title,
            'descriptions' => $request->descriptions,
            'image1' => $img_name_1,
            'image2' => $img_name_2,
            'image3' => $img_name_3,
            'image4' => $img_name_4
        
        ])) {

            return redirect()->route('backend.banner')->with('success','Sửa banner quảng cáo thành công');

        }

        else {

            return redirect()->back()->with('error','Sửa bị lỗi vui lòng sửa lại');
        };
    }

    public function destroy($id)

    {
        banner::destroy($id);
        return redirect()->route('backend.banner')->with('success','Xóa thành công');
    }
   
}
