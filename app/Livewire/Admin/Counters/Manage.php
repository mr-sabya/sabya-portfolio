<?php

namespace App\Livewire\Admin\Counters;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Counter;

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
    public $counter_id;
    public $number;
    public $suffix; // e.g., +, k, %
    public $title;
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

        $counter = Counter::findOrFail($id);

        $this->counter_id = $counter->id;
        $this->number     = $counter->number;
        $this->suffix     = $counter->suffix;
        $this->title      = $counter->title;
        $this->sort_order = $counter->sort_order;
        $this->status     = $counter->status;
    }

    public function store()
    {
        $this->validate([
            'number'     => 'required|string|max:50',
            'suffix'     => 'nullable|string|max:10',
            'title'      => 'required|string|max:255',
            'sort_order' => 'integer',
        ]);

        Counter::updateOrCreate(['id' => $this->counter_id], [
            'number'     => $this->number,
            'suffix'     => $this->suffix,
            'title'      => $this->title,
            'sort_order' => $this->sort_order,
            'status'     => $this->status ? 1 : 0,
        ]);

        $this->dispatch('show-toast', [
            'message' => $this->counter_id ? 'Counter Updated Successfully' : 'Counter Created Successfully',
            'type' => 'success'
        ]);

        $this->dispatch('close-modal');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Counter::find($id)->delete();
        $this->dispatch('show-toast', ['message' => 'Counter Deleted Successfully', 'type' => 'error']);
    }

    private function resetInputFields()
    {
        $this->counter_id = null;
        $this->number = '';
        $this->suffix = '';
        $this->title = '';
        $this->sort_order = 0;
        $this->status = true;
        $this->isEditMode = false;
    }

    public function render()
    {
        $counters = Counter::where('title', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.counters.manage', ['counters' => $counters]);
    }
}
