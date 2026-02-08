<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\PostContent;
use App\Models\SeoDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Manage extends Component
{
    use WithFileUploads;

    // Post Properties
    public $post_id, $category_id, $title, $status = true;
    public $thumbnail, $current_thumbnail;

    // SEO Properties
    public $meta_title, $meta_description, $meta_keywords, $og_image, $current_og_image;

    // Dynamic Blocks Array
    public $blocks = [];

    // UI State
    public $isEditMode = false;
    public $activeTab = 'details'; // details, seo

    public function mount($id = null)
    {
        if ($id) {
            $this->isEditMode = true;
            $post = Post::with(['contents', 'seo'])->findOrFail($id);

            $this->post_id           = $post->id;
            $this->category_id       = $post->category_id; // Load category
            $this->title             = $post->title;
            $this->status            = (bool)$post->status;
            $this->current_thumbnail = $post->thumbnail;

            // Load SEO
            if ($post->seo) {
                $this->meta_title       = $post->seo->meta_title;
                $this->meta_description = $post->seo->meta_description;
                $this->meta_keywords    = $post->seo->meta_keywords;
                $this->current_og_image = $post->seo->og_image;
            }

            // Load Blocks
            foreach ($post->contents as $content) {
                $this->blocks[] = [
                    'type' => $content->type,
                    'data' => $content->data, // Model cast handles array conversion
                ];
            }
        }
    }

    public function addBlock($type)
    {
        $data = match ($type) {
            'text'  => ['body' => ''],
            'image' => ['url' => '', 'caption' => '', 'temp_image' => null],
            'code'  => ['code' => '', 'lang' => 'javascript'],
            default => [],
        };

        $this->blocks[] = ['type' => $type, 'data' => $data];
    }

    public function removeBlock($index)
    {
        unset($this->blocks[$index]);
        $this->blocks = array_values($this->blocks);
    }

    public function store()
    {
        $this->validate([
            'title'                     => 'required|string|max:255',
            'category_id'               => 'required|exists:categories,id', // Added
            'thumbnail'                 => $this->isEditMode ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'blocks.*.data.temp_image'  => 'nullable|image|max:2048',
            'og_image'                  => 'nullable|image|max:2048',
        ]);

        // 1. Save Main Post
        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'title'   => $this->title,
            'slug'    => Str::slug($this->title),
            'category_id' => $this->category_id, // Save category
            'status'  => $this->status ? 1 : 0,
            'user_id' => Auth::id(),
        ]);

        if ($this->thumbnail) {
            if ($post->thumbnail) Storage::disk('public')->delete($post->thumbnail);
            $post->thumbnail = $this->thumbnail->store('posts/thumbnails', 'public');
            $post->save();
        }

        // 2. Save SEO Details
        $seoData = [
            'meta_title'       => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords'    => $this->meta_keywords,
        ];

        if ($this->og_image) {
            if ($post->seo && $post->seo->og_image) Storage::disk('public')->delete($post->seo->og_image);
            $seoData['og_image'] = $this->og_image->store('posts/seo', 'public');
        }

        $post->seo()->updateOrCreate(['post_id' => $post->id], $seoData);

        // 3. Save Dynamic Blocks
        $post->contents()->delete(); // Refresh blocks
        foreach ($this->blocks as $index => $block) {
            $blockData = $block['data'];

            // Handle block-level image uploads
            if ($block['type'] === 'image' && isset($blockData['temp_image'])) {
                $blockData['url'] = $blockData['temp_image']->store('posts/content', 'public');
            }

            // Clean up temporary objects before JSON storage
            unset($blockData['temp_image']);

            $post->contents()->create([
                'type'       => $block['type'],
                'data'       => $blockData,
                'sort_order' => $index
            ]);
        }

        session()->flash('success', 'Blog post saved successfully!');
        return redirect()->route('admin.posts.index');
    }

    public function render()
    {
        return view('livewire.admin.posts.manage', [
            'categories' => Category::all(), // Pass categories to view
        ]);
    }
}
