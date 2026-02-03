<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'partner_id',
        'title',
        'slug',
        'thumbnail',
        'description_one',
        'description_two',
        'mini_title',
        'mini_description',
        'author_name',
        'project_date',
        'tags',
        'sort_order',
        'status'
    ];

    protected $casts = ['project_date' => 'date'];

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();
        static::creating(fn($project) => $project->slug = Str::slug($project->title));
    }

    public function client()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
