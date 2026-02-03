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

class Manage extends Component
{
    use WithFileUploads;

    public $project_id, $partner_id, $title, $description_one, $description_two;
    public $mini_title, $mini_description, $author_name = 'Admin', $project_date;
    public $tags, $sort_order = 0, $status = true, $progress = 'in-progress';

    public $thumbnail, $current_thumbnail;
    public $selected_techs = [];
    public $gallery_images = [];

    public $isEditMode = false;

    public function mount($id = null)
    {
        if ($id) {
            $this->isEditMode = true;
            $project = Project::with(['technologies', 'gallery'])->findOrFail($id);

            $this->project_id       = $project->id;
            $this->partner_id       = $project->partner_id;
            $this->title            = $project->title;
            $this->description_one  = $project->description_one;
            $this->description_two  = $project->description_two;
            $this->mini_title       = $project->mini_title;
            $this->mini_description = $project->mini_description;
            $this->author_name      = $project->author_name;
            $this->project_date     = $project->project_date->format('Y-m-d');
            $this->tags             = $project->tags;
            $this->sort_order       = $project->sort_order;
            $this->status           = (bool)$project->status;
            $this->progress         = $project->progress;
            $this->current_thumbnail = $project->thumbnail;
            $this->selected_techs   = $project->technologies->pluck('id')->toArray();
        } else {
            $this->project_date = now()->format('Y-m-d');
        }
    }

    public function store()
    {
        $this->validate([
            'partner_id'      => 'required|exists:partners,id',
            'title'           => 'required|string|max:255',
            'thumbnail'       => $this->isEditMode ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'description_one' => 'required',
            'project_date'    => 'required|date',
            'selected_techs'  => 'required|array|min:1',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        $project = Project::find($this->project_id) ?? new Project();

        if ($this->thumbnail) {
            if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            $project->thumbnail = $this->thumbnail->store('projects/thumbs', 'public');
        }

        $project->partner_id       = $this->partner_id;
        $project->title            = $this->title;
        $project->slug             = Str::slug($this->title);
        $project->description_one  = $this->description_one;
        $project->description_two  = $this->description_two;
        $project->mini_title       = $this->mini_title;
        $project->mini_description = $this->mini_description;
        $project->author_name      = $this->author_name;
        $project->project_date     = $this->project_date;
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
        return redirect()->route('admin.projects.index');
    }

    public function deleteImage($imageId)
    {
        $image = ProjectImage::find($imageId);
        if ($image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
    }

    public function render()
    {
        return view('livewire.admin.projects.manage', [
            'partners' => Partner::all(),
            'technologies' => Technology::all(),
            'current_gallery' => $this->project_id ? Project::find($this->project_id)->gallery : []
        ]);
    }
}
