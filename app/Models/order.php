<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ='order';
    
 	protected $fillable=[
 		'sum','id_cus','type','note','admin_id','r_name','r_phone','r_address','status','created_at'
 	];}
