<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class about_us extends Model
{
    protected $table ='about_us';
    
 	protected $fillable = [
        'address','phone','email', 'time_work','link_map','link_fb','link_instagram','link_youtube'
    ];

    public $timestamps = false;
}
