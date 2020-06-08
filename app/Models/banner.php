<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table ='banner';
    
 	protected $fillable = [
        'title','descriptions','image1','image2','image3','image4'
    ];

    public $timestamps = false;
}
