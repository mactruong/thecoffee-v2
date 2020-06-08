<?php

namespace App\Http\Controllers\Backend;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {    

        $users = user::where('type',1)->where('status',1)->orderby('created_at','DESC')->paginate(10);

        return View('user.index',[
            'users'=>$users
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('user.create'); 
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
            'full_name' => 'required|min:3|max:30',
            'address' => 'required|max:50',
            'phone' => 'required|max:15|unique:user,email'
        ],
        [
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 30 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 30 kí tự',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'address.max'=> 'Địa chỉ bạn nhập quá dài',
            'phone.required'=> 'Bạn phải nhập số điện thoại',
            'phone.max'=> 'Số điện thoại không quá 11 số',
            'phone.unique'=> 'Số điện thoại đã tồn tại',
        ]);

        if(User::Create([
            'full_name'=>$request->full_name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'type'=>2,

        ]))
        {
            return redirect()->route('backend.order-add-user')->with('success','Thêm khách hàng thành công');

        }

        else {
            return redirect()->back()->with('error','Thêm khách hàng bị lỗi vui lòng thêm lại');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */

    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        return view('user.edit',[
            'model' => user::find($id),
            
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = user::find($id);
         $this->validate($request,[
            'username'=> 'required|min:3|max:30|unique:user,username',                
            'email' => 'required|unique:user,email',
            'full_name' => 'required',
            
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.unique'=> 'Tài khoản đã tồn tại',
           
            'email.required'=> 'Bạn phải nhập email',
            'full_name.required'=> 'Bạn phải nhập họ tên',
            
        ]);

        if($model->update([
            'username'=>$request->username,          
            'email'=>$request->email,
            'full_name'=>$request->full_name,
        

        ]))
        {
            return redirect()->route('backend.user')->with('success','Sửa tài khoản thành công');

        }

        else {
            return redirect()->back()->with('error','Sửa bị lỗi vui lòng sửa lại');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(user $user ,$id)
    {
        
        User::destroy($id);
        
        return redirect()->route('backend.user')->with('success','Xóa thành công!');;
    }
}
