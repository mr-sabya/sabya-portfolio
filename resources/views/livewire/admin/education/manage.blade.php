<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search by designation...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <button class="btn btn-info" wire:click="create" data-bs-toggle="modal" data-bs-target="#educationModal">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add New Education
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-2 col-6">
                            <select wire:model.live="perPage" class="form-select form-select-sm">
                                <option value="5">5 per page</option>
                                <option value="10">10 per page</option>
                                <option value="25">25 per page</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="cursor: pointer" wire:click="sortBy('id')">ID <i class="fas fa-sort"></i></th>
                                    <th style="cursor: pointer" wire:click="sortBy('designation')">Designation <i class="fas fa-sort"></i></th>
                                    <th>Duration</th>
                                    <th style="cursor: pointer" wire:click="sortBy('sort_order')">Order <i class="fas fa-sort"></i></th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($educations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->designation }}</td>
                                    <td>{{ $item->duration }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $item->sort_order }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                            {{ $item->status ? 'Active' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#educationModal" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:confirm="Are you sure?" wire:click="delete({{ $item->id }})" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $educations->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="educationModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Education' : 'Add New Education' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        {{-- Loading --}}
                        <div wire:loading.block wire:target="edit" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div wire:loading.remove wire:target="edit">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Designation/Degree <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="designation" placeholder="e.g. Master of Science">
                                    @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Duration <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="duration" placeholder="e.g. 2015 - 2019">
                                    @error('duration') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" wire:model="sort_order">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4" wire:model="description" placeholder="Brief about your studies..."></textarea>
                                    @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="eduStatus" wire:model="status">
                                        <label class="form-check-label" for="eduStatus">Active Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Changes' : 'Save Education' }}</span>
                            <span wire:loading wire:target="store">Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>