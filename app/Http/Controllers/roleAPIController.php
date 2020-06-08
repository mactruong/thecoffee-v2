<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class roleAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return role::all();
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
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required' => 'không được để trống',

        ]);
         if(role::create([
            'name' => $request->name

        ])){
            return 1; 

        }
        else {
            return 0;
        }
    }

    public function getByID($id){
        $role = role::find($id);
        return $role; 
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $model = role::find($id);
        $this->validate($request,[
            'name'=> 'required',
        ], [
            'name.required'=> 'không được để trống',
           
        ]);
        
        if($model->update([
            'name' => $request->name,
            
        ])) {

            return 1;
        } 
        else {

            return 0;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        role::destroy($id);
        return 1;
    }
   
}
