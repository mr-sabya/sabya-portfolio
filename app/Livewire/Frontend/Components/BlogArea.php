<?php

namespace App\Livewire\Frontend\Components;

use App\Models\Post;
use Livewire\Component;

class BlogArea extends Component
{
    public function render()
    {
        return view('livewire.frontend.components.blog-area', [
            // Fetch the 3 latest published posts with author info
            'posts' => Post::with('user')
                ->where('status', true)
                ->latest()
                ->take(3)
                ->get()
        ]);
    }
}
