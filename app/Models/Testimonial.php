<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    protected $fillable = [
        'partner_id',
        'client_name',
        'client_designation',
        'client_avatar',
        'comment',
        'sort_order',
        'status'
    ];

    /**
     * Optional: Link to the Partner (Company)
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
