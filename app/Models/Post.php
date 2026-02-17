<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'status',
        'user_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: A post has many content blocks (Text, Image, Code)
    public function contents()
    {
        return $this->hasMany(PostContent::class)->orderBy('sort_order');
    }

    // Relationship: A post has one SEO record
    public function seo()
    {
        return $this->hasOne(SeoDetail::class);
    }

    // app/Models/Post.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
