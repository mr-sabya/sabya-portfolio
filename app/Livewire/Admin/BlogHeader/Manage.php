<?php

namespace App\Livewire\Admin\BlogHeader;

use Livewire\Component;
use App\Models\BlogHeader;

class Manage extends Component
{
    public $subtitle;
    public $title;

    public function mount()
    {
        $header = BlogHeader::first();

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

        BlogHeader::updateOrCreate(
            ['id' => 1],
            [
                'subtitle' => $this->subtitle,
                'title'    => $this->title,
            ]
        );

        $this->dispatch('show-toast', [
            'message' => 'Blog Header updated successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.blog-header.manage');
    }
}
