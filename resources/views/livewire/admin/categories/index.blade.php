<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- List Column -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Post Categories</h5>
                    <input type="text" wire:model.live="search" class="form-control w-25 form-control-sm" placeholder="Search...">
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th class="text-center">Post Count</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td><span class="fw-bold">{{ $category->name }}</span></td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle">
                                        {{ $category->posts_count }} Posts
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button wire:click="edit({{ $category->id }})" class="btn btn-sm btn-soft-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:confirm="Are you sure? This cannot be undone." wire:click="delete({{ $category->id }})" class="btn btn-sm btn-soft-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No categories found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">{{ $isEditMode ? 'Edit Category' : 'Create New Category' }}</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Category Name</label>
                            <input type="text" wire:model.live="name" class="form-control" placeholder="e.g. Laravel Tutorials">
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Slug (Auto-generated)</label>
                            <input type="text" wire:model="slug" class="form-control bg-light" readonly>
                            @error('slug') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 shadow-sm">
                                <i class="fas fa-save me-1"></i> {{ $isEditMode ? 'Update Category' : 'Save Category' }}
                            </button>
                            @if($isEditMode)
                            <button type="button" wire:click="resetFields" class="btn btn-light py-2 border">
                                Cancel
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tip Card -->
            <div class="card bg-info-subtle border-0 mt-3">
                <div class="card-body small text-info">
                    <i class="fas fa-info-circle me-1"></i> Categories help organize your blog posts and improve SEO rankings.
                </div>
            </div>
        </div>
    </div>
</div>