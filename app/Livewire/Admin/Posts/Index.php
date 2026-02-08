<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;

    #[On('refresh-post-list')]
    public function refresh()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->thumbnail) Storage::disk('public')->delete($post->thumbnail);

        // Delete block images if any exist
        foreach ($post->contents as $block) {
            if ($block->type === 'image' && isset($block->data['path'])) {
                Storage::disk('public')->delete($block->data['path']);
            }
        }

        $post->delete();
        $this->dispatch('show-toast', ['message' => 'Post Deleted', 'type' => 'error']);
    }

    public function render()
    {
        return view('livewire.admin.posts.index', [
            'posts' => Post::with('user')
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->perPage),
        ]);
    }
}
