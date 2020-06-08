<?php

namespace App\Http\Controllers\Backend;

use App\Models\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = role::all();

        return View('role.index',[
            'role'=>$role
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
            'name'=>'required|max:50',
        ],[
            'name.required' => 'không được để trống',
            'name.max'=> 'Tên quyền không quá 50 kí tự',

        ]);

        if(role::create([
            'name' => $request->name,
            'role_key' => $request->role_key,
            'status' => 1,


        ])) {
            return redirect()->route('backend.role')->with('success','Thêm quyền quản lý thành công'); 

        }

        else {
            return redirect()->back()->with('error','Thêm thất bại! Vui lòng thử lại');
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
    public function edit($id)
    {
       
        return view('role.edit',[
            
            'model' => role::find($id),
            
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = role::find($id);
        $this->validate($request,[
            'name' => 'required',
            
        ],
        [
            'name.required'=> 'Bạn phải nhập tên quyền quản lý',
            
        ]);

        if($model->update([
        
            'name'=>$request->name,
            'status' => $request->status
        ]))
        {
            return redirect()->route('backend.role')->with('success','Sửa  quyền quản lý thành công');

        }

        else {
            
            return redirect()->back()->with('error','Sửa bị lỗi! Vui lòng sửa lại');
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

    public function destroy($id)
    {
        role::destroy($id);

        return redirect()->route('backend.role')->with('success','Xóa thành công');
    }
   
}
