<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterSection extends Model
{
    protected $fillable = [
        'exp_number',
        'exp_title',
        'exp_description'
    ];
}
