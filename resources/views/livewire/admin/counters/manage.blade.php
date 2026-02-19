<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search by title...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <button class="btn btn-info" wire:click="create" data-bs-toggle="modal" data-bs-target="#counterModal">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add New Counter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="cursor: pointer" wire:click="sortBy('id')">ID <i class="fas fa-sort"></i></th>
                                    <th>Full Value</th>
                                    <th style="cursor: pointer" wire:click="sortBy('title')">Title <i class="fas fa-sort"></i></th>
                                    <th style="cursor: pointer" wire:click="sortBy('sort_order')">Order <i class="fas fa-sort"></i></th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($counters as $counter)
                                <tr>
                                    <td>{{ $counter->id }}</td>
                                    <td><span class="h5 mb-0 fw-bold text-primary">{{ $counter->number }}{{ $counter->suffix }}</span></td>
                                    <td>{{ $counter->title }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $counter->sort_order }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $counter->status ? 'success' : 'danger' }}">
                                            {{ $counter->status ? 'Active' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $counter->id }})" data-bs-toggle="modal" data-bs-target="#counterModal" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:confirm="Are you sure?" wire:click="delete({{ $counter->id }})" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No counters found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $counters->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="counterModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Counter' : 'Add New Counter' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div wire:loading.block wire:target="edit" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                            <p class="mt-2 text-muted">Loading data...</p>
                        </div>

                        <div wire:loading.remove wire:target="edit">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label">Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="number" placeholder="e.g. 10, 250, 99">
                                    @error('number') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Suffix</label>
                                    <input type="text" class="form-control" wire:model="suffix" placeholder="+, %, k">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Title/Label <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="title" placeholder="e.g. Years Experience">
                                    @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" wire:model="sort_order">
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="counterStatus" wire:model="status">
                                        <label class="form-check-label" for="counterStatus">Active Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Changes' : 'Save Counter' }}</span>
                            <span wire:loading wire:target="store">Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('close-modal', event => {
        const modalElement = document.getElementById('counterModal');
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (modalInstance) {
            modalInstance.hide();
        }
    });
</script>