<?php

namespace App\Livewire\Frontend\Blog;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function mount($blogId)
    {
        // Load relationships including SEO and sorted contents
        $this->post = Post::with(['category', 'user', 'contents', 'seo'])
            ->where('id', $blogId)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.blog.show', [
            'recentPosts' => Post::where('id', '!=', $this->post->id)
                ->where('status', 1)
                ->latest()
                ->take(3)
                ->get(),
            'categories' => Category::withCount('posts')->get(),
            'prevPost' => Post::where('id', '<', $this->post->id)->where('status', 1)->latest()->first(),
            'nextPost' => Post::where('id', '>', $this->post->id)->where('status', 1)->oldest()->first(),
        ]);
    }
}
