<?php

namespace App\Livewire\Admin\PortfolioHeader;

use Livewire\Component;
use App\Models\PortfolioHeader;

class Manage extends Component
{
    public $subtitle;
    public $title;
    public $description;

    public function mount()
    {
        // Fetch the first record or create a blank instance
        $header = PortfolioHeader::first();

        if ($header) {
            $this->subtitle    = $header->subtitle;
            $this->title       = $header->title;
            $this->description = $header->description;
        }
    }

    public function updateHeader()
    {
        $this->validate([
            'subtitle'    => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update if exists, or create new
        PortfolioHeader::updateOrCreate(
            ['id' => 1], // Assuming you only ever have one header record
            [
                'subtitle'    => $this->subtitle,
                'title'       => $this->title,
                'description' => $this->description,
            ]
        );

        // Dispatch Toast Notification (Matches your ServiceSection style)
        $this->dispatch('show-toast', [
            'message' => 'Portfolio Header updated successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.portfolio-header.manage');
    }
}
