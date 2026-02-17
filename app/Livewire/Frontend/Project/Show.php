<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public Project $project;

    public function mount($projectId)
    {
        // Load project with technologies, gallery, and the client (Partner)
        $this->project = Project::with(['technologies', 'gallery', 'client'])
            ->where('id', $projectId)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.project.show');
    }
}
