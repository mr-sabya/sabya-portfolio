<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description_one',
        'description_two',
        'image'
    ];

    /**
     * Get the URL for the profile image.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }
        return asset('assets/frontend/images/about/about-main.jpg');
    }
}
