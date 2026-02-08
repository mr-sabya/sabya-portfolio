<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    protected $fillable = [
        'post_id',
        'type',
        'data',
        'sort_order'
    ];

    protected $casts = [
        'data' => 'array', // Crucial for handling dynamic fields
    ];
}
