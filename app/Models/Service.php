<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'sub_title',
        'title',
        'description',
        'featured_image'
    ];
}
