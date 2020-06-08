<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
 	protected $table ='role';
 	
 	protected $fillable=[
 		'name','role_key','status'
 	];
 	
 	public $timestamps = false;
}
