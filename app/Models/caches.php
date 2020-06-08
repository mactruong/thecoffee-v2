<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class caches extends Model
{
    protected  $table = 'caches';

    protected $fillable = [
        'value','expiration'
    ]; 
}
