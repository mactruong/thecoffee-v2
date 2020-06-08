<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected  $table = 'products';

    protected $fillable = [
    	'name','slug','image','cat_id','review','price','promo'
    ]; 
}
