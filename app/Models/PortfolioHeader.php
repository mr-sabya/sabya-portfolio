<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioHeader extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'description'
    ];
}
