<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'designation',
        'duration',
        'description',
        'sort_order',
        'status'
    ];
}
