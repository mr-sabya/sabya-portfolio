<?php

namespace App\Livewire\Admin\TestimonialHeader;

use Livewire\Component;
use App\Models\TestimonialHeader;

class Manage extends Component
{
    public $subtitle;
    public $title;

    public function mount()
    {
        $header = TestimonialHeader::first();

        if ($header) {
            $this->subtitle = $header->subtitle;
            $this->title    = $header->title;
        }
    }

    public function updateHeader()
    {
        $this->validate([
            'subtitle' => 'required|string|max:255',
            'title'    => 'required|string|max:255',
        ]);

        TestimonialHeader::updateOrCreate(
            ['id' => 1],
            [
                'subtitle' => $this->subtitle,
                'title'    => $this->title,
            ]
        );

        $this->dispatch('show-toast', [
            'message' => 'Testimonial Header updated successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.testimonial-header.manage');
    }
}
