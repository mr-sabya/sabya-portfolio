<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon_class',
        'short_description',
        'description',
        'details_url',
        'sort_order',
        'status'
    ];

    /**
     * The attributes that should be cast.
     * This ensures the status is treated as a boolean/integer correctly.
     */
    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
