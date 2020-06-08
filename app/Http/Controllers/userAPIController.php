<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return user::all();

        
    }
    public function getByID($id) {
        
        $user = user::find($id);
        return $user; 
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|min:3|max:50|unique:user,username',
            'password'=> 'required|min:3|max:50',
            'password_rp' => 'same:password',
            'full_name' => 'required|min:3|max:50',
            'email' => 'required|unique:user,email',
            'address' => 'required',
            'phone' => 'required'
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 50 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 50 kí tự',
            'username.unique'=> 'Tài khoản đã tồn tại',
            'password.required'=> 'Chưa nhập mật khẩu',
            'password.min'=> 'Mật khẩu từ 3 đến 50 kí tự',
            'password.max'=> 'Mật khẩu từ 3 đến 50 kí tự',
            'password_rp.same'=> 'Nhập lại mật khẩu không đúng',
            'full_name.required'=> 'Bạn chưa nhập họ tên',
            'full_name.min'=> 'Họ tên từ 3 đến 50 kí tự',
            'full_name.max'=> 'Họ tên từ 3 đến 50 kí tự',
            'email.required'=> 'Bạn phải nhập email',
            'address.required'=> 'Bạn phải nhập địa chỉ',
            'phone.required'=> 'Bạn phải nhập số điện thoại'
        ]);
        if(User::Create([
            'username'=>$request->username,           
            'password'=>bcrypt($request->password),
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'groups'=>2,
            'status'=>1 

        ]))
        {
            return redirect()->route('login')->with('success','Đăng kí thành công');

        }
        else{
             return redirect()->back()->with('error','Đăng kí bị lỗi vui lòng đăng kí lại');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
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
        return redirect()->route('backend.user');
    }
}
