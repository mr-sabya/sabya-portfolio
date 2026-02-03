<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search technology...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <button class="btn btn-info" wire:click="create" data-bs-toggle="modal" data-bs-target="#technologyModal">
                                <i class="ri-add-fill me-1 align-bottom"></i> Add Technology
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
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($technologies as $tech)
                                <tr>
                                    <td>
                                        <div class="bg-light p-1 rounded d-inline-block border" style="width: 120px; text-align: center;">
                                            <img src="{{ asset('storage/' . $tech->icon) }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </td>
                                    <td class="fw-bold">{{ $tech->name }}</td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $tech->id }})" data-bs-toggle="modal" data-bs-target="#technologyModal" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:confirm="Are you sure?" wire:click="delete({{ $tech->id }})" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">No technologies found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $technologies->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="technologyModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Technology' : 'Add New Technology' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div wire:loading.block wire:target="edit" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div wire:loading.remove wire:target="edit">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Technology Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="name" placeholder="e.g. Laravel, Photoshop">
                                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Technology Icon/Logo <span class="text-danger">*</span></label>
                                    <div class="card bg-light border-0">
                                        <div class="card-body text-center">
                                            <!-- Image Preview Logic -->
                                            @if ($icon)
                                            <div class="mb-3">
                                                <p class="small text-success fw-bold">New Icon Preview:</p>
                                                <img src="{{ $icon->temporaryUrl() }}" class="img-fluid rounded shadow-sm bg-white p-2" style="max-height: 80px;">
                                            </div>
                                            @elseif ($current_icon)
                                            <div class="mb-3">
                                                <p class="small text-muted fw-bold">Current Icon:</p>
                                                <img src="{{ asset('storage/'.$current_icon) }}" class="img-fluid rounded shadow-sm bg-white p-2" style="max-height: 80px;">
                                            </div>
                                            @else
                                            <div class="mb-3">
                                                <div class="py-4">
                                                    <i class="ri-image-add-line display-4 text-muted opacity-50"></i>
                                                    <p class="small text-muted mt-2">No Icon Uploaded</p>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="mt-3 text-center">
                                                <label class="form-label fw-bold small">Upload New Icon (SVG, PNG, JPG)</label>
                                                <input type="file" class="form-control" wire:model="icon">

                                                {{-- Uploading Indicator --}}
                                                <div wire:loading wire:target="icon" class="text-primary small mt-1">
                                                    <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                                </div>

                                                @error('icon') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                            <span>{{ $isEditMode ? 'Update Changes' : 'Save Technology' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('close-modal', event => {
        // Find the modal by ID passed from Livewire
        const modalElement = document.querySelector(event.detail.modalId);

        // Get the existing Bootstrap modal instance
        const modalInstance = bootstrap.Modal.getInstance(modalElement);

        if (modalInstance) {
            modalInstance.hide();
        }
    });
</script>