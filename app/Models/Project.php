<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'partner_id',
        'title',
        'slug',
        'thumbnail',        // Existing
        'project_image',    // New: Main feature image
        'website_link',     // New: Live project URL
        'description_one',
        'description_two',
        'mini_title',
        'mini_description',
        'author_name',
        'project_date',     // Existing (General display date)
        'start_date',       // New: Actual start
        'end_date',         // New: Actual completion
        'client_deadline',  // New: Target date
        'budget',           // New: Project value
        'tags',
        'sort_order',
        'status',
        'progress'
    ];

    protected $casts = [
        'project_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'client_deadline' => 'date',
        'status' => 'boolean',
    ];

    /**
     * Boot logic for auto-generating slugs.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            // Only update slug if title changed
            if ($project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /**
     * Accessor: Calculate Completion Percentage based on Tasks.
     */
    public function getCompletionPercentageAttribute()
    {
        $totalTasks = $this->tasks()->count();
        if ($totalTasks === 0) {
            return 0;
        }

        $completedTasks = $this->tasks()->where('status', 'done')->count();
        return round(($completedTasks / $totalTasks) * 100);
    }

    /* -------------------------------------------------------------------------- */
    /*                                RELATIONSHIPS                               */
    /* -------------------------------------------------------------------------- */

    public function client(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function milestones(): HasMany
    {
        return $this->hasMany(ProjectMilestone::class)->orderBy('due_date', 'asc');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ProjectFile::class);
    }
}
