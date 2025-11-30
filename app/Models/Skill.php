<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_category_id',
        'name',
        'percent',
        'sort_order',
        'status'
    ];

    // Relationship: A skill belongs to a category
    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
}
