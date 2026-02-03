<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search partners...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <button class="btn btn-info" wire:click="create" data-bs-toggle="modal" data-bs-target="#partnerModal">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add New Partner
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
                                    <th>Logo</th>
                                    <th style="cursor: pointer" wire:click="sortBy('name')">Name <i class="fas fa-sort"></i></th>
                                    <th style="cursor: pointer" wire:click="sortBy('sort_order')">Order <i class="fas fa-sort"></i></th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($partners as $partner)
                                <tr>
                                    <td>
                                        <div class="bg-light p-2 rounded d-inline-block">
                                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="" style="height: 30px; width: auto;">
                                        </div>
                                    </td>
                                    <td class="fw-bold">{{ $partner->name ?? 'N/A' }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $partner->sort_order }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $partner->status ? 'success' : 'danger' }}">
                                            {{ $partner->status ? 'Active' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $partner->id }})" data-bs-toggle="modal" data-bs-target="#partnerModal" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:confirm="Are you sure?" wire:click="delete({{ $partner->id }})" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No partners found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $partners->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="partnerModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Partner' : 'Add New Partner' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        {{-- Loading Indicator --}}
                        <div wire:loading.block wire:target="edit" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div wire:loading.remove wire:target="edit">
                            <div class="row g-3">

                                {{-- Left Side: Details --}}
                                <div class="col-md-7">
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" wire:model="name" placeholder="e.g. Envato Group">
                                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Website Link (Optional)</label>
                                        <input type="url" class="form-control" wire:model="link" placeholder="https://example.com">
                                        @error('link') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Sort Order</label>
                                            <input type="number" class="form-control" wire:model="sort_order">
                                        </div>
                                        <div class="col-md-6 d-flex align-items-end">
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="partnerStatus" wire:model="status">
                                                <label class="form-check-label" for="partnerStatus">Active Status</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Side: Logo Upload (Professional Style) --}}
                                <div class="col-md-5">
                                    <label class="form-label fw-bold">Company Logo <span class="text-danger">*</span></label>
                                    <div class="card bg-light border-0 text-center">
                                        <div class="card-body">
                                            {{-- Image Preview Logic --}}
                                            @if ($logo)
                                            <div class="mb-2">
                                                <p class="small text-success fw-bold">New Logo Preview:</p>
                                                <div class="p-3 bg-white rounded border">
                                                    <img src="{{ $logo->temporaryUrl() }}" class="img-fluid" style="max-height: 80px;">
                                                </div>
                                            </div>
                                            @elseif ($current_logo)
                                            <div class="mb-2">
                                                <p class="small text-muted">Current Logo:</p>
                                                <div class="p-3 bg-white rounded border">
                                                    <img src="{{ asset('storage/'.$current_logo) }}" class="img-fluid" style="max-height: 80px;">
                                                </div>
                                            </div>
                                            @else
                                            <div class="mb-2 py-3">
                                                <i class="ri-image-add-line display-4 text-muted"></i>
                                                <p class="small text-muted mt-2">No logo uploaded</p>
                                            </div>
                                            @endif

                                            <div class="mt-3">
                                                <input type="file" class="form-control" wire:model="logo">
                                                <div wire:loading wire:target="logo" class="text-primary small mt-1">
                                                    <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                                </div>
                                                @error('logo') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Partner' : 'Save Partner' }}</span>
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
        // Find the modal element by the ID passed from Livewire
        let modalElement = document.querySelector(event.detail.modalId);

        // Get the Bootstrap modal instance
        let modalInstance = bootstrap.Modal.getInstance(modalElement);

        // Hide the modal
        if (modalInstance) {
            modalInstance.hide();
        }
    });
</script>