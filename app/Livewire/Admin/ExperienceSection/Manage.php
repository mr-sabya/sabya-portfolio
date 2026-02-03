<?php

namespace App\Livewire\Admin\ExperienceSection;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ExperienceSection;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    use WithFileUploads;

    // Image Handling
    public $new_image;
    public $current_image;

    public function mount()
    {
        // Get existing data or create blank record
        $section = ExperienceSection::firstOrNew();
        $this->current_image = $section->experience_image;
    }

    public function updateSection()
    {
        $this->validate([
            'new_image' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $section = ExperienceSection::first();

        if (!$section) {
            $section = new ExperienceSection();
        }

        // Image Upload Logic
        if ($this->new_image) {
            // Delete old image if it exists in storage
            if ($section->experience_image && Storage::disk('public')->exists($section->experience_image)) {
                Storage::disk('public')->delete($section->experience_image);
            }

            // Store new image in 'experience-sections' directory
            $imagePath = $this->new_image->store('experience-sections', 'public');
            $section->experience_image = $imagePath;
        }

        $section->save();

        // Refresh state
        $this->current_image = $section->experience_image;
        $this->new_image = null;

        // Dispatch Toast Notification
        $this->dispatch('show-toast', [
            'message' => 'Experience Section Image updated successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.experience-section.manage');
    }
}