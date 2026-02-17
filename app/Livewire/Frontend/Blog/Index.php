<?php

namespace App\Livewire\Frontend\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        $posts = Post::with(['category', 'user'])
            ->where('status', 1) // Assuming 1 is active
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.frontend.blog.index', [
            'posts' => $posts
        ]);
    }
}
