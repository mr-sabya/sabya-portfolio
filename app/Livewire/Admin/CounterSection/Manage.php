<?php

namespace App\Livewire\Admin\CounterSection;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CounterSection;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    use WithFileUploads;

    public $exp_number;
    public $exp_title;
    public $exp_description;

    // Image Handling
    public $new_image;
    public $current_image;

    public function mount()
    {
        // Get existing data or create blank
        $section = CounterSection::firstOrNew();

        $this->exp_number      = $section->exp_number;
        $this->exp_title       = $section->exp_title;
        $this->exp_description = $section->exp_description;
        $this->current_image   = $section->featured_image; // Ensure this is in your migration
    }

    public function updateSection()
    {
        $this->validate([
            'exp_number'      => 'required|string|max:50',
            'exp_title'       => 'required|string|max:255',
            'exp_description' => 'required|string',
            'new_image'       => 'nullable|image|max:2048',
        ]);

        $section = CounterSection::first();

        if (!$section) {
            $section = new CounterSection();
        }

        // Image Upload Logic
        if ($this->new_image) {
            // Delete old image if exists
            if ($section->featured_image && Storage::disk('public')->exists($section->featured_image)) {
                Storage::disk('public')->delete($section->featured_image);
            }

            // Store new image
            $imagePath = $this->new_image->store('counter-sections', 'public');
            $section->featured_image = $imagePath;
        }

        // Update Text Fields
        $section->exp_number      = $this->exp_number;
        $section->exp_title       = $this->exp_title;
        $section->exp_description = $this->exp_description;

        $section->save();

        // Refresh state
        $this->current_image = $section->featured_image;
        $this->new_image = null;

        $this->dispatch('show-toast', [
            'message' => 'Counter Section updated successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.counter-section.manage');
    }
}
