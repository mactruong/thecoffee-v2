<?php

namespace App\Http\Controllers\Backend;

use App\Models\about_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class aboutUsController extends Controller
{
    

    public function index() {

        $aboutUs = about_us::first();
        return View('about-us.index',[
            'aboutUs'=>$aboutUs
        ]);    
    }

    public function edit($id) {

        return view('about-us.edit',[
            
            'model' => about_us::find($id)
            
        ]);  
    }

    public function update(Request $request, $id)
    {
        $model = about_us::find($id);
         $this->validate($request,[
            'address'=> 'required',
            'phone' => 'required',                
            'email' => 'required',
            'time_work' => 'required',
            
        ],
        [
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'email.required'=> 'Bạn phải nhập email',
            'time_work.required'=> 'Bạn phải nhập thời gian mở cửa',
            
        ]);

        if($model->update([
            'address'=>$request->address,          
            'phone'=>$request->phone,
            'email'=>$request->email,
            'time_work' => $request->time_work,
            'link_map'=>$request->link_map,          
            'link_fb'=>$request->link_fb,
            'link_instagram'=>$request->link_instagram,
            'link_youtube' => $request->link_youtube,
        

        ]))
        {
            return redirect()->route('backend.about-us')->with('success','Sửa thông tin thành công');

        }
        else {
            return redirect()->back()->with('error','Sửa bị lỗi! Vui lòng sửa lại');
        };
    }
}
