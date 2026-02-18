<div>
    <!-- Tabs Navigation -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-custom-schemes mb-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#about-bio" role="tab">Personal Bio & Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#missions" role="tab">Mission & Vision</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#values" role="tab">Core Values</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <!-- TAB 1: BIO & IMAGE -->
        <div class="tab-pane active" id="about-bio" role="tabpanel">
            <form wire:submit.prevent="saveAbout">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card border shadow-sm">
                            <div class="card-body text-center">
                                @if ($new_image)
                                <div class="mb-3">
                                    <p class="small text-success fw-bold">New Image Preview:</p>
                                    <img src="{{ $new_image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                </div>
                                @elseif ($current_image)
                                <div class="mb-3">
                                    <p class="small text-muted fw-bold">Current Image:</p>
                                    <img src="{{ asset('storage/'.$current_image) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                </div>
                                @else
                                <div class="mb-3">
                                    <img src="{{ url('assets/frontend/images/banner/banner-user-image-three.png') }}" class="img-fluid opacity-50" style="max-height: 200px;">
                                    <p class="small text-muted mt-2">Default Placeholder Shown</p>
                                </div>
                                @endif

                                <div class="mt-3">
                                    <label class="form-label fw-bold">Upload New Image</label>
                                    <input type="file" class="form-control" wire:model="new_image">
                                    <div wire:loading wire:target="new_image" class="text-primary small mt-1">
                                        <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                    </div>
                                    @error('new_image') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Section Title</label>
                                    <input type="text" class="form-control" wire:model="about_title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Bio Paragraph 1</label>
                                    <livewire:quill-text-editor wire:model.live="about_desc1" theme="snow" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Bio Paragraph 2</label>
                                    <livewire:quill-text-editor wire:model.live="about_desc2" theme="snow" />
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Update Portfolio Bio</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- TAB 2: MISSIONS -->
        <div class="tab-pane" id="missions" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Mission & Vision List</h5>
                    <button class="btn btn-info btn-sm" wire:click="openModal('mission')" data-bs-toggle="modal" data-bs-target="#itemModal">Add New</button>
                </div>
                <div class="card-body">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Subtitle</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($missions as $m)
                            <tr>
                                <td>{{ $m->subtitle }}</td>
                                <td class="fw-bold">{{ $m->title }}</td>
                                <td><span class="badge bg-{{ $m->status ? 'success' : 'secondary' }}">{{ $m->status ? 'Active' : 'Hidden' }}</span></td>
                                <td class="text-end">
                                    <button wire:click="openModal('mission', {{ $m->id }})" data-bs-toggle="modal" data-bs-target="#itemModal" class="btn btn-sm btn-soft-primary"><i class="ri-edit-line"></i></button>
                                    <button wire:click="deleteItem('mission', {{ $m->id }})" wire:confirm="Delete this?" class="btn btn-sm btn-soft-danger"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 3: CORE VALUES -->
        <div class="tab-pane" id="values" role="tabpanel">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Work Ethics & Values</h5>
                    <button class="btn btn-info btn-sm" wire:click="openModal('value')" data-bs-toggle="modal" data-bs-target="#itemModal">Add New</button>
                </div>
                <div class="card-body">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($values as $v)
                            <tr>
                                <td>{{ $v->sort_order }}</td>
                                <td class="fw-bold">{{ $v->title }}</td>
                                <td><span class="badge bg-{{ $v->status ? 'success' : 'secondary' }}">{{ $v->status ? 'Active' : 'Hidden' }}</span></td>
                                <td class="text-end">
                                    <button wire:click="openModal('value', {{ $v->id }})" data-bs-toggle="modal" data-bs-target="#itemModal" class="btn btn-sm btn-soft-primary"><i class="ri-edit-line"></i></button>
                                    <button wire:click="deleteItem('value', {{ $v->id }})" wire:confirm="Delete this?" class="btn btn-sm btn-soft-danger"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- SHARED MODAL FOR MISSION & VALUES -->
    <div class="modal fade" id="itemModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <form wire:submit.prevent="saveItem" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Edit' : 'Add' }} {{ ucfirst($item_type) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @if($item_type === 'mission')
                        <div class="col-12">
                            <label class="form-label">Subtitle (e.g. The Goal)</label>
                            <input type="text" class="form-control" wire:model="subtitle">
                        </div>
                        @endif

                        <div class="col-md-{{ $item_type === 'value' ? '8' : '12' }}">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" wire:model="title">
                        </div>

                        @if($item_type === 'value')
                        <div class="col-md-4">
                            <label class="form-label">Sort Order</label>
                            <input type="number" class="form-control" wire:model="sort_order">
                        </div>
                        @endif

                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" wire:model="description"></textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:model="status">
                                <label class="form-check-label">Active Status</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>