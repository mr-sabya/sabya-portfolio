<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'status' // Added status to follow your Service pattern
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
