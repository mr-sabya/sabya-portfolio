<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search Company or Role...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <button class="btn btn-info" wire:click="create" data-bs-toggle="modal" data-bs-target="#experienceModal">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add New Experience
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
                                    <th style="cursor: pointer" wire:click="sortBy('name')">Company <i class="fas fa-sort"></i></th>
                                    <th>Role / Designation</th>
                                    <th>Duration</th>
                                    <th style="cursor: pointer" wire:click="sortBy('sort_order')">Order <i class="fas fa-sort"></i></th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($experiences as $exp)
                                <tr>
                                    <td>{{ $exp->id }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $exp->name }}</div>
                                        <small class="text-muted">{{ $exp->subtitle }}</small>
                                    </td>
                                    <td>{{ $exp->designation }}</td>
                                    <td>{{ $exp->duration }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $exp->sort_order }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $exp->status ? 'success' : 'danger' }}">
                                            {{ $exp->status ? 'Active' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $exp->id }})" data-bs-toggle="modal" data-bs-target="#experienceModal" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:confirm="Are you sure?" wire:click="delete({{ $exp->id }})" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $experiences->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="experienceModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Experience' : 'Add New Experience' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div wire:loading.block wire:target="edit" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div wire:loading.remove wire:target="edit">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="name" placeholder="e.g. Google Inc">
                                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location/Subtitle</label>
                                    <input type="text" class="form-control" wire:model="subtitle" placeholder="e.g. New York, USA">
                                    @error('subtitle') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="designation" placeholder="e.g. Senior Developer">
                                    @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Duration <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="duration" placeholder="e.g. 2020 - Present">
                                    @error('duration') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" wire:model="sort_order">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description / Key Responsibilities</label>
                                    <textarea class="form-control" rows="4" wire:model="description" placeholder="List your achievements..."></textarea>
                                    @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="expStatus" wire:model="status">
                                        <label class="form-check-label" for="expStatus">Active Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Experience' : 'Save Experience' }}</span>
                            <span wire:loading wire:target="store">Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>