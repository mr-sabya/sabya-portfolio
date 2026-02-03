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
        'thumbnail',
        'description_one',
        'description_two',
        'mini_title',
        'mini_description',
        'author_name',
        'project_date',
        'tags',
        'sort_order',
        'status',
        'progress' // Added to fix SQL error
    ];

    protected $casts = [
        'project_date' => 'date',
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
            $project->slug = Str::slug($project->title);
        });
    }

    /**
     * Accessor: Calculate Completion Percentage based on Tasks.
     * Used in the Project Hub header progress bar.
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

    /**
     * Get the client (Partner) associated with the project.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    /**
     * Get the technologies used in this project.
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }

    /**
     * Get the public gallery images (for frontend swiper).
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Get project milestones (Phases).
     */
    public function milestones(): HasMany
    {
        return $this->hasMany(ProjectMilestone::class)->orderBy('due_date', 'asc');
    }

    /**
     * Get all tasks associated with the project.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class);
    }

    /**
     * Get private documents and internal assets.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(ProjectFile::class);
    }
}
