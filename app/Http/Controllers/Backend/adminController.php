<?php

namespace App\Http\Controllers\Backend;

use App\Models\admins;
use App\Models\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;


class adminController extends Controller
{


    public function index()
    {
        
        return view('admin.index');
    }


    public function create()
    { 
          return view('admin.create',[ 
            'admins' => admins::all(), 
            'role'=>role::where('status',1)->get()           
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|min:3|max:50|unique:user,username',
            'password'=> 'required|min:3|max:50',
            'password_rp' => 'same:password',           
            'email' => 'required|unique:user,email',
            'full_name'=> 'required|max:50',
         
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
            'email.required'=> 'Bạn phải nhập email',
            'full_name.required'=> 'Bạn phải nhập họ tên',
            'full_name.max'=> 'Họ tên không quá 50 kí tự',
        ]);

        if(admins::Create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),          
            'email'=>$request->email,
            'full_name'=>$request->full_name,
            'id_role' => $request->id_role,
           

        ]))
        {
            return redirect()->route('backend.admin')->with('success','Đăng kí thành công');

        }

        else {
            return redirect()->back()->with('error','Đăng kí bị lỗi! Vui lòng đăng kí lại');
        }
    }


    public function edit($id) {

        return view('admin.edit',[
            'model' => admins::find($id),
            'role'=> role::all()
            
        ]);  
    }

    public function changePassword($id) {

        return view('admin.change-password');  
    }


    public function updatePassword(Request $request, $id) {

         $model = admins::find($id);
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

        if(Hash::check($request->oldPassword, Auth::guard('admin')->user()->password)) {
           
           if($request->newPassword == $request->confirmPassword) {
               $admins = admins::find(Auth::guard('admin')->user()->id);
               $admins->password = bcrypt($request->newPassword);
               $admins->save();
               Auth::guard('admin')->logout();
               return redirect()->route('admin.login')->with('success','Đổi mật khẩu thành công, Vui lòng đăng nhập lại!');
           } 

           else {

               return redirect()->back()->with('error','Mật khẩu xác nhận phải trùng khớp');
           }

       }

       else {

           return redirect()->back()->with('error','Mật khẩu cũ không chính xác');
       }
    }


    public function update(Request $request, $id)
    {
        $model = admins::find($id);
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
            'id_role' => $request->id_role,
        

        ]))
        {
            return redirect()->route('backend.admin')->with('success','Sửa tài khoản thành công');

        }
        else {
            return redirect()->back()->with('error','Sửa bị lỗi vui lòng sửa lại');
        };
    }

    
    public function destroy(admin $id)
    {
        
        admin::destroy($id);
        return redirect()->route('backend.admin')->with('success','Xóa tài khoản thành công');;
    }
}
