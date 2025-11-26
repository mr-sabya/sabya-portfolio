<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    use HasFactory;

    protected $table = 'hero_banners';

    protected $fillable = [
        'greeting',
        'name',
        'designation',
        'button_text',
        'button_url',
        'about_title',
        'about_description',
        'hero_image',
        'bg_text_1',
        'bg_text_2',
    ];
}
