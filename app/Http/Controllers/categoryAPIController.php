<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return category::all();
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
            'name'=>'required'
        ],[
            'name.required' => 'không được để trống',

        ]);
        
        if(category::create([
            'name' => $request->name,
            'slug' => $request->slug

        ])) {
        
            return 1; 

        }

        else {
        
            return 0;
        }
    }

    public function getByID($slug){
        $category = category::find($slug);
        return $category; 
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    
    public function edit($slug)
    {
       
        $model = category::find($slug);
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

        return 1;
    }
   
}
