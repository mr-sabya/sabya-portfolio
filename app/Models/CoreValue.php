<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
