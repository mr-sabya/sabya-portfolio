<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // Form Fields
    public $name, $slug, $category_id;

    // UI State
    public $search = '';
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:50|unique:categories,name',
        'slug' => 'required|string|unique:categories,slug',
    ];

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $validationRules = $this->rules;
        if ($this->isEditMode) {
            $validationRules['name'] = 'required|string|max:50|unique:categories,name,' . $this->category_id;
            $validationRules['slug'] = 'required|string|unique:categories,slug,' . $this->category_id;
        }

        $this->validate($validationRules);

        Category::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->dispatch('show-toast', ['message' => $this->isEditMode ? 'Category Updated' : 'Category Created', 'type' => 'success']);
        $this->resetFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->isEditMode = true;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        if ($category->posts()->count() > 0) {
            $this->dispatch('show-toast', ['message' => 'Cannot delete! Category has posts.', 'type' => 'error']);
            return;
        }

        $category->delete();
        $this->dispatch('show-toast', ['message' => 'Category Deleted', 'type' => 'error']);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->slug = '';
        $this->category_id = null;
        $this->isEditMode = false;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.categories.index', [
            'categories' => Category::where('name', 'like', '%' . $this->search . '%')
                ->withCount('posts')
                ->latest()
                ->paginate(10),
        ]);
    }
}
