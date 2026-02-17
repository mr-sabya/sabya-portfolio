<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // Set initial amount of items to show
    public $perPage = 4;

    /**
     * Increase the number of items shown
     */
    public function loadMore()
    {
        $this->perPage += 4;
    }

    public function render()
    {
        // Fetch projects based on perPage limit
        $projects = Project::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->paginate($this->perPage);

        return view('livewire.frontend.project.index', [
            'projects' => $projects
        ]);
    }
}