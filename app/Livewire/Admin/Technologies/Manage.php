<?php

namespace App\Livewire\Admin\Technologies;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    // DataTable Properties
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortDirection = 'desc';

    // Model Properties
    public $technology_id;
    public $name;
    public $icon; // New upload
    public $current_icon; // Existing path

    // UI State
    public $isEditMode = false;

    public function updatedSearch()
    {
        $this->resetPage();
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

        $tech = Technology::findOrFail($id);

        $this->technology_id = $tech->id;
        $this->name          = $tech->name;
        $this->current_icon  = $tech->icon;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:100|unique:technologies,name,' . $this->technology_id,
            'icon' => $this->isEditMode ? 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:1024' : 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        $tech = Technology::find($this->technology_id) ?? new Technology();

        if ($this->icon) {
            // Delete old icon if exists
            if ($tech->icon) Storage::disk('public')->delete($tech->icon);
            // Store new icon
            $tech->icon = $this->icon->store('technologies', 'public');
        }

        $tech->name = $this->name;
        $tech->save();

        $this->dispatch('show-toast', [
            'message' => $this->technology_id ? 'Technology Updated' : 'Technology Created',
            'type' => 'success'
        ]);

        $this->dispatch('close-modal', modalId: '#technologyModal');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tech = Technology::find($id);
        if ($tech->icon) Storage::disk('public')->delete($tech->icon);
        $tech->delete();
        $this->dispatch('show-toast', ['message' => 'Technology Deleted', 'type' => 'error']);
    }

    private function resetInputFields()
    {
        $this->technology_id = null;
        $this->name = '';
        $this->icon = null;
        $this->current_icon = null;
        $this->isEditMode = false;
    }

    public function render()
    {
        $technologies = Technology::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.technologies.manage', ['technologies' => $technologies]);
    }
}
