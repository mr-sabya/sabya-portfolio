<?php

namespace App\Livewire\Admin\Education;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Education;

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
    public $education_id;
    public $designation;
    public $duration;
    public $description;
    public $sort_order = 0;
    public $status = true;

    // UI State
    public $isEditMode = false;

    // Reset pagination when searching
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Sorting Logic
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    // Prepare for Create
    public function create()
    {
        $this->resetInputFields();
        $this->isEditMode = false;
    }

    // Prepare for Edit
    public function edit($id)
    {
        $this->resetInputFields();
        $this->isEditMode = true;

        $education = Education::findOrFail($id);
        
        $this->education_id = $education->id;
        $this->designation  = $education->designation;
        $this->duration     = $education->duration;
        $this->description  = $education->description;
        $this->sort_order   = $education->sort_order;
        $this->status       = (bool)$education->status;
    }

    // Save or Update
    public function store()
    {
        // 1. Validate
        $this->validate([
            'designation' => 'required|string|max:255',
            'duration'    => 'required|string|max:100', // e.g., "2018 - 2022"
            'description' => 'nullable|string',
            'sort_order'  => 'integer',
        ]);

        // 2. Update or Create
        Education::updateOrCreate(['id' => $this->education_id], [
            'designation' => $this->designation,
            'duration'    => $this->duration,
            'description' => $this->description,
            'sort_order'  => $this->sort_order,
            'status'      => $this->status ? 1 : 0,
        ]);

        // 3. Notification
        $this->dispatch('show-toast', [
            'message' => $this->education_id ? 'Education Updated Successfully' : 'Education Created Successfully',
            'type' => 'success'
        ]);

        // 4. Reset & Close Modal (via JS if needed)
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    // Delete
    public function delete($id)
    {
        Education::find($id)->delete();
        $this->dispatch('show-toast', ['message' => 'Education Deleted Successfully', 'type' => 'error']);
    }

    private function resetInputFields()
    {
        $this->education_id = null;
        $this->designation = '';
        $this->duration = '';
        $this->description = '';
        $this->sort_order = 0;
        $this->status = true;
        $this->isEditMode = false;
    }

    public function render()
    {
        $educations = Education::where('designation', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.education.manage', ['educations' => $educations]);
    }
}