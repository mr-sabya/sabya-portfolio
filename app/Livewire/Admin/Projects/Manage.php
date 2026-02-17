<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;
use App\Models\Partner;
use App\Models\Technology;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Manage extends Component
{
    use WithFileUploads;

    // Project Properties
    public $project_id, $partner_id, $title, $description_one, $description_two;
    public $mini_title, $mini_description, $author_name = 'Admin', $project_date;
    public $tags, $sort_order = 0, $status = true, $progress = 'in-progress';

    // NEW FIELDS
    public $website_link, $budget, $start_date, $end_date, $client_deadline;
    public $project_image, $current_project_image;

    // File Properties
    public $thumbnail, $current_thumbnail;
    public $selected_techs = [];
    public $gallery_images = [];

    // UI State
    public $isEditMode = false;
    public $activeTab = 'details';

    public function mount($id = null)
    {
        if ($id) {
            $this->isEditMode = true;
            $project = Project::with(['technologies', 'gallery'])->findOrFail($id);

            $this->project_id       = $project->id;
            $this->partner_id       = $project->partner_id;
            $this->title            = $project->title;
            $this->website_link     = $project->website_link;
            $this->budget           = $project->budget;
            $this->description_one  = $project->description_one;
            $this->description_two  = $project->description_two;
            $this->mini_title       = $project->mini_title;
            $this->mini_description = $project->mini_description;
            $this->author_name      = $project->author_name;
            $this->tags             = $project->tags;
            $this->sort_order       = $project->sort_order;
            $this->status           = (bool)$project->status;
            $this->progress         = $project->progress ?? 'in-progress';

            // Format dates for HTML5 input fields
            $this->project_date     = $project->project_date?->format('Y-m-d');
            $this->start_date       = $project->start_date?->format('Y-m-d');
            $this->end_date         = $project->end_date?->format('Y-m-d');
            $this->client_deadline  = $project->client_deadline?->format('Y-m-d');

            $this->current_thumbnail     = $project->thumbnail;
            $this->current_project_image = $project->project_image;
            $this->selected_techs        = $project->technologies->pluck('id')->toArray();
        } else {
            $this->project_date = now()->format('Y-m-d');
        }
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function store()
    {
        $this->validate([
            'partner_id'      => 'required|exists:partners,id',
            'title'           => 'required|string|max:255',
            'thumbnail'       => $this->isEditMode ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'project_image'   => 'nullable|image|max:4096',
            'description_one' => 'required',
            'project_date'    => 'required|date',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date',
            'client_deadline' => 'nullable|date',
            'selected_techs'  => 'required|array|min:1',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        $project = Project::find($this->project_id) ?? new Project();

        // Handle Main Thumbnail
        if ($this->thumbnail) {
            if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            $project->thumbnail = $this->thumbnail->store('projects/thumbs', 'public');
        }

        // Handle Main Project Image (Large Feature Image)
        if ($this->project_image) {
            if ($project->project_image) Storage::disk('public')->delete($project->project_image);
            $project->project_image = $this->project_image->store('projects/features', 'public');
        }

        $project->partner_id       = $this->partner_id;
        $project->title            = $this->title;
        $project->website_link     = $this->website_link;
        $project->budget           = $this->budget;
        $project->description_one  = $this->description_one;
        $project->description_two  = $this->description_two;
        $project->mini_title       = $this->mini_title;
        $project->mini_description = $this->mini_description;
        $project->author_name      = $this->author_name;
        $project->project_date     = $this->project_date;
        $project->start_date       = $this->start_date;
        $project->end_date         = $this->end_date;
        $project->client_deadline  = $this->client_deadline;
        $project->tags             = $this->tags;
        $project->sort_order       = $this->sort_order;
        $project->status           = $this->status ? 1 : 0;
        $project->progress         = $this->progress;
        $project->save();

        $project->technologies()->sync($this->selected_techs);

        if ($this->gallery_images) {
            foreach ($this->gallery_images as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->gallery()->create(['image_path' => $path]);
            }
        }

        session()->flash('success', 'Project saved successfully!');
        return $this->redirect(route('admin.projects.edit', ['id' => $project->id]), navigate:true);
    }

    public function deleteImage($imageId)
    {
        $image = ProjectImage::find($imageId);
        if ($image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
    }

    #[On('task-updated')]
    public function refreshProjectData() {}

    public function render()
    {
        $projectData = $this->project_id ? Project::with('gallery')->find($this->project_id) : null;

        return view('livewire.admin.projects.manage', [
            'partners' => Partner::all(),
            'technologies' => Technology::all(),
            'project' => $projectData,
            'completion' => $projectData ? $projectData->completion_percentage : 0
        ]);
    }
}
