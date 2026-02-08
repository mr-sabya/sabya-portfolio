<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'currency',
        'period_label',
        'period_range',
        'features',
        'is_featured',
        'button_text',
        'button_url',
        'sort_order',
        'status'
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2'
    ];
}
