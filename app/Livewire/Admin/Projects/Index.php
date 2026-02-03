<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;

    #[On('refresh-project-list')]
    public function refresh()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
        foreach ($project->gallery as $img) Storage::disk('public')->delete($img->image_path);
        $project->delete();

        $this->dispatch('show-toast', ['message' => 'Project Deleted', 'type' => 'error']);
    }

    public function render()
    {
        return view('livewire.admin.projects.index', [
            'projects' => Project::with('client')
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->perPage),
        ]);
    }
}
