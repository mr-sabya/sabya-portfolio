<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogHeader extends Model
{
    protected $fillable = [
        'subtitle',
        'title'
    ];
}
