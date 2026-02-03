<?php

namespace App\Livewire\Admin\Partners;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    // DataTable Properties
    public $search = '';
    public $perPage = 10;
    public $sortField = 'sort_order';
    public $sortDirection = 'asc';

    // Model Properties
    public $partner_id, $name, $link, $sort_order = 0, $status = true;
    public $logo, $current_logo; // For file handling

    public $isEditMode = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = ($this->sortField === $field && $this->sortDirection === 'asc') ? 'desc' : 'asc';
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
        $partner = Partner::findOrFail($id);

        $this->partner_id   = $partner->id;
        $this->name         = $partner->name;
        $this->link         = $partner->link;
        $this->current_logo = $partner->logo;
        $this->sort_order   = $partner->sort_order;
        $this->status       = (bool)$partner->status;
    }

    public function store()
    {
        $this->validate([
            'name' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'logo' => $this->isEditMode
                ? 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:1024'
                : 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'sort_order' => 'integer',
        ]);

        $partner = Partner::find($this->partner_id) ?? new Partner();

        if ($this->logo) {
            if ($partner->logo) Storage::disk('public')->delete($partner->logo);
            $partner->logo = $this->logo->store('partners', 'public');
        }

        $partner->name = $this->name;
        $partner->link = $this->link;
        $partner->sort_order = $this->sort_order;
        $partner->status = $this->status ? 1 : 0;
        $partner->save();

        $this->dispatch('show-toast', [
            'message' => $this->partner_id ? 'Partner Updated' : 'Partner Added',
            'type' => 'success'
        ]);

        // ADD THIS: Dispatch event to close the modal
        $this->dispatch('close-modal', modalId: '#partnerModal');

        $this->resetInputFields();
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        if ($partner->logo) Storage::disk('public')->delete($partner->logo);
        $partner->delete();
        $this->dispatch('show-toast', ['message' => 'Partner Deleted', 'type' => 'error']);
    }

    private function resetInputFields()
    {
        $this->partner_id = null;
        $this->name = '';
        $this->link = '';
        $this->logo = null;
        $this->current_logo = null;
        $this->sort_order = 0;
        $this->status = true;
    }

    public function render()
    {
        $partners = Partner::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.partners.manage', ['partners' => $partners]);
    }
}
