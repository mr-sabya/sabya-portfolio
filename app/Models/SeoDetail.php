<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoDetail extends Model
{
    protected $fillable = [
        'post_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image'
    ];
}
