<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $fillable = [
        'title',
        'sort_order',
        'status'
    ];

    // Relationship: A category has many skills
    public function skills()
    {
        return $this->hasMany(Skill::class)->orderBy('sort_order', 'asc');
    }
}
