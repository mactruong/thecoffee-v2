<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {    
        $admins = admins::join('role','admins.id_role','=','role.id') 
                        ->select('admins.*', 'role.name')
                        ->get();
        return $admins;
    }

    public function getByID($id) {

        $admins = admins::find($id);

        return $admins; 
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
            'username'=> 'required|min:3|max:50|unique:user,username',
            'password'=> 'required|min:3|max:50',
            'password_rp' => 'same:password',           
            'email' => 'required|unique:user,email',
            'full_name'=> 'required',
         
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
            
        ]);

        if(Admins::Create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),          
            'email'=>$request->email,
            'full_name'=>$request->full_name,
           

        ]))
        {
            return 1;

        }

        else {
            return 0;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */

    public function show(admins $admins)
    {
        return admins::find($id);
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
            'model' => admins::find($id),
            
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
        $model = admins::find($id);
         $this->validate($request,[
            'username'=> 'required|min:3|max:50|unique:user,username',                
            'email' => 'required|unique:user,email',
            'full_name' => 'required',
            
        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 50 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 50 kí tự',
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

    public function destroy(admins $admins ,$id)
    {
        
        admins::destroy($id);
        
        return 1;
    }
}
