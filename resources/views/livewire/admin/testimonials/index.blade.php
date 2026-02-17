<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Client Testimonials</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal" wire:click="resetFields">
            <i class="ri-add-line"></i> Add Testimonial
        </button>
    </div>

    <!-- Stats/Search Area -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search by name..." wire:model.live="search">
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Sort</th>
                        <th>Client</th>
                        <th>Company</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $item)
                    <tr>
                        <td><span class="badge bg-secondary">{{ $item->sort_order }}</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $item->client_avatar ? asset('storage/'.$item->client_avatar) : url('assets/frontend/images/banner/banner-user-image-three.png') }}" 
                                     class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                <div>
                                    <div class="fw-bold">{{ $item->client_name }}</div>
                                    <small class="text-muted">{{ $item->client_designation }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->partner->name ?? 'Individual' }}</td>
                        <td><small class="text-muted">{{ Str::limit($item->comment, 50) }}</small></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:click="toggleStatus({{ $item->id }})" {{ $item->status ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-info me-1" wire:click="edit({{ $item->id }})">
                                <i class="ri-edit-box-line"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="delete({{ $item->id }})">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No testimonials found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white">
            {{ $testimonials->links() }}
        </div>
    </div>

    <!-- Modal Form -->
    <div wire:ignore.self class="modal fade" id="testimonialModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit Testimonial' : 'Add New Testimonial' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6 text-center border-end">
                                <label class="form-label d-block fw-bold">Client Avatar</label>
                                @if ($client_avatar)
                                    <img src="{{ $client_avatar->temporaryUrl() }}" class="rounded-circle shadow-sm mb-2" width="120" height="120">
                                @elseif ($current_avatar)
                                    <img src="{{ asset('storage/'.$current_avatar) }}" class="rounded-circle shadow-sm mb-2" width="120" height="120">
                                @else
                                    <img src="{{ url('assets/frontend/images/banner/banner-user-image-three.png') }}" class="rounded-circle opacity-50 mb-2" width="120" height="120">
                                @endif
                                <input type="file" class="form-control mt-2" wire:model="client_avatar">
                                @error('client_avatar') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Client Name</label>
                                    <input type="text" class="form-control" wire:model="client_name">
                                    @error('client_name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Designation</label>
                                    <input type="text" class="form-control" wire:model="client_designation" placeholder="e.g. CEO, Founder">
                                    @error('client_designation') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Linked Company (Partner)</label>
                                <select class="form-select" wire:model="partner_id">
                                    <option value="">No Company</option>
                                    @foreach($partners as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sort Order</label>
                                <input type="number" class="form-control" wire:model="sort_order">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Client Comment</label>
                                <textarea class="form-control" rows="4" wire:model="comment" placeholder="What did the client say about your work?"></textarea>
                                @error('comment') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove>{{ $isEditMode ? 'Update Testimonial' : 'Save Testimonial' }}</span>
                            <span wire:loading>Processing...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Helper Script -->
    <script>
        window.addEventListener('openModal', event => {
            var myModal = new bootstrap.Modal(document.getElementById('testimonialModal'));
            myModal.show();
        });
        window.addEventListener('closeModal', event => {
            bootstrap.Modal.getInstance(document.getElementById('testimonialModal')).hide();
        });
    </script>
</div>