<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    // Model Properties
    public $testimonial_id, $partner_id, $client_name, $client_designation, $comment;
    public $sort_order = 0, $status = 1;
    public $client_avatar, $current_avatar;

    // UI State
    public $search = '';
    public $isEditMode = false;

    protected $rules = [
        'client_name' => 'required|string|max:255',
        'client_designation' => 'required|string|max:255',
        'comment' => 'required|string|min:10',
        'partner_id' => 'nullable|exists:partners,id',
        'client_avatar' => 'nullable|image|max:1024', // 1MB Max
        'sort_order' => 'required|integer',
    ];

    public function resetFields()
    {
        $this->reset(['testimonial_id', 'partner_id', 'client_name', 'client_designation', 'comment', 'client_avatar', 'current_avatar', 'isEditMode']);
        $this->sort_order = 0;
        $this->status = 1;
    }

    public function edit($id)
    {
        $this->resetFields();
        $this->isEditMode = true;
        $testimonial = Testimonial::findOrFail($id);

        $this->testimonial_id     = $testimonial->id;
        $this->partner_id         = $testimonial->partner_id;
        $this->client_name        = $testimonial->client_name;
        $this->client_designation = $testimonial->client_designation;
        $this->comment            = $testimonial->comment;
        $this->sort_order         = $testimonial->sort_order;
        $this->status             = $testimonial->status;
        $this->current_avatar     = $testimonial->client_avatar;

        $this->dispatch('openModal'); // Trigger Bootstrap Modal via JS
    }

    public function save()
    {
        $this->validate();

        $testimonial = $this->testimonial_id ? Testimonial::find($this->testimonial_id) : new Testimonial();

        // Handle Image Upload
        if ($this->client_avatar) {
            if ($testimonial->client_avatar) {
                Storage::disk('public')->delete($testimonial->client_avatar);
            }
            $path = $this->client_avatar->store('testimonials', 'public');
            $testimonial->client_avatar = $path;
        }

        $testimonial->partner_id         = $this->partner_id;
        $testimonial->client_name        = $this->client_name;
        $testimonial->client_designation = $this->client_designation;
        $testimonial->comment            = $this->comment;
        $testimonial->sort_order         = $this->sort_order;
        $testimonial->status             = $this->status;
        $testimonial->save();

        session()->flash('success', $this->testimonial_id ? 'Testimonial updated!' : 'Testimonial added!');
        $this->resetFields();
        $this->dispatch('closeModal');
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->status = !$testimonial->status;
        $testimonial->save();
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->client_avatar) {
            Storage::disk('public')->delete($testimonial->client_avatar);
        }
        $testimonial->delete();
        session()->flash('success', 'Testimonial deleted successfully.');
    }

    public function render()
    {
        $testimonials = Testimonial::with('partner')
            ->where('client_name', 'like', '%' . $this->search . '%')
            ->orderBy('sort_order', 'asc')
            ->paginate(10);

        return view('livewire.admin.testimonials.index', [
            'testimonials' => $testimonials,
            'partners' => Partner::all()
        ]);
    }
}
