<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
	protected  $table = 'news';

    protected $fillable = [
    	'title','slug','short_content','full','images','admin_id'
    ]; 
}
