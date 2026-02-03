<?php

namespace App\Livewire\Admin\Experience;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Experience;

class Manage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // DataTable Properties
    public $search = '';
    public $perPage = 10;
    public $sortField = 'sort_order';
    public $sortDirection = 'asc';

    // Model Properties
    public $experience_id;
    public $name;           // Company Name
    public $subtitle;       // Location or Dept
    public $designation;    // Job Role
    public $duration;       // Period
    public $description;    // Job Responsibilities
    public $sort_order = 0;
    public $status = true;

    // UI State
    public $isEditMode = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditMode = false;
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->isEditMode = true;

        $experience = Experience::findOrFail($id);

        $this->experience_id = $experience->id;
        $this->name          = $experience->name;
        $this->subtitle      = $experience->subtitle;
        $this->designation   = $experience->designation;
        $this->duration      = $experience->duration;
        $this->description   = $experience->description;
        $this->sort_order    = $experience->sort_order;
        $this->status        = (bool)$experience->status;
    }

    public function store()
    {
        $this->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'duration'    => 'required|string|max:100',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order'  => 'integer',
        ]);

        Experience::updateOrCreate(['id' => $this->experience_id], [
            'name'        => $this->name,
            'subtitle'    => $this->subtitle,
            'designation' => $this->designation,
            'duration'    => $this->duration,
            'description' => $this->description,
            'sort_order'  => $this->sort_order,
            'status'      => $this->status ? 1 : 0,
        ]);

        $this->dispatch('show-toast', [
            'message' => $this->experience_id ? 'Experience Updated Successfully' : 'Experience Created Successfully',
            'type' => 'success'
        ]);

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        $this->dispatch('show-toast', ['message' => 'Experience Deleted Successfully', 'type' => 'error']);
    }

    private function resetInputFields()
    {
        $this->experience_id = null;
        $this->name = '';
        $this->subtitle = '';
        $this->designation = '';
        $this->duration = '';
        $this->description = '';
        $this->sort_order = 0;
        $this->status = true;
        $this->isEditMode = false;
    }

    public function render()
    {
        $experiences = Experience::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('designation', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.experience.manage', ['experiences' => $experiences]);
    }
}
