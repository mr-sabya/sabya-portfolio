<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'subtitle',
        'name',
        'designation',
        'duration', // <--- Added here
        'description',
        'sort_order',
        'status'
    ];
}
