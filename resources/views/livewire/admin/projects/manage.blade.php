<div class="container-fluid py-4">
    <!-- Project Hub Header -->
    <div class="card bg-primary text-white border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h3 class="text-white mb-1">{{ $title ?: 'New Project' }}</h3>
                <p class="mb-0 opacity-75">Project Management & Tracking</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end" style="width: 200px">
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>Completion</span>
                        <span>{{ $completion }}%</span>
                    </div>
                    <div class="progress" style="height: 8px; background: rgba(255,255,255,0.2)">
                        <div class="progress-bar bg-success" style="width: {{ $completion }}%"></div>
                    </div>
                </div>
                <a href="{{ route('admin.projects.index') }}" wire:navigate class="btn btn-light btn-sm ms-3">
                    <i class="ri-arrow-left-line"></i> Back
                </a>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav nav-pills mb-4 bg-white p-2 rounded shadow-sm border">
        <li class="nav-item">
            <button wire:click="setTab('details')" class="nav-link {{ $activeTab == 'details' ? 'active' : '' }}">
                <i class="ri-information-line me-1"></i> Project Details
            </button>
        </li>
        @if($isEditMode)
        <li class="nav-item">
            <button wire:click="setTab('tasks')" class="nav-link {{ $activeTab == 'tasks' ? 'active' : '' }}">
                <i class="ri-task-line me-1"></i> Tasks & Milestones
            </button>
        </li>
        <li class="nav-item">
            <button wire:click="setTab('files')" class="nav-link {{ $activeTab == 'files' ? 'active' : '' }}">
                <i class="ri-file-list-3-line me-1"></i> Documents & Assets
            </button>
        </li>
        @endif
    </ul>

    <!-- Main Content Area -->
    <div class="tab-content">
        <!-- DETAILS TAB -->
        <div class="tab-pane fade {{ $activeTab == 'details' ? 'show active' : '' }}">
            <form wire:submit.prevent="store">
                <div class="row g-4">
                    {{-- Left Column: Main Content --}}
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Project Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" wire:model="title" placeholder="Enter project title">
                                        @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Website Link</label>
                                        <input type="url" class="form-control" wire:model="website_link" placeholder="https://example.com">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Budget / Value</label>
                                        <input type="text" class="form-control" wire:model="budget" placeholder="e.g. $5,000">
                                    </div>

                                    <!-- Timeline Section -->
                                    <div class="col-12 mt-4">
                                        <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ri-calendar-event-line"></i> Timeline & Scheduling</h6>
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <label class="form-label small fw-bold">Display Date</label>
                                                <input type="date" class="form-control" wire:model="project_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-bold">Start Date</label>
                                                <input type="date" class="form-control" wire:model="start_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-bold">End Date</label>
                                                <input type="date" class="form-control" wire:model="end_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-bold text-danger">Client Deadline</label>
                                                <input type="date" class="form-control" wire:model="client_deadline">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label class="form-label fw-bold">Primary Description</label>
                                        <livewire:quill-text-editor wire:model.live="description_one" theme="snow" />
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ri-layout-6-line"></i> Secondary Content</h6>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Mini Title</label>
                                            <input type="text" class="form-control" wire:model="mini_title" placeholder="Secondary Heading">
                                        </div>
                                        <label class="form-label fw-bold">Mini Description / Extra Details</label>
                                        <livewire:quill-text-editor wire:model.live="description_two" theme="snow" />
                                    </div>

                                    <!-- Gallery Section -->
                                    <div class="col-12 mt-4">
                                        <label class="form-label fw-bold text-primary">Gallery Swiper Images</label>
                                        <div class="card bg-light border-0">
                                            <div class="card-body">
                                                @if ($gallery_images)
                                                <div class="mb-3">
                                                    <p class="small text-success fw-bold">New Gallery Preview:</p>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach($gallery_images as $image)
                                                        <img src="{{ $image->temporaryUrl() }}" class="rounded shadow-sm" style="width: 100px; height: 70px; object-fit: cover;">
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif

                                                @if($isEditMode && $project && $project->gallery->count() > 0)
                                                <div class="mb-3">
                                                    <p class="small text-muted fw-bold">Current Gallery (Click X to delete):</p>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach($project->gallery as $img)
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/'.$img->image_path) }}" class="rounded border" style="width: 100px; height: 70px; object-fit: cover;">
                                                            <button type="button" wire:click="deleteImage({{ $img->id }})" class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0 shadow-sm" style="width:20px;height:20px; line-height:1;">&times;</button>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <input type="file" class="form-control" wire:model="gallery_images" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light text-end">
                                <button type="submit" class="btn btn-primary px-5 shadow">
                                    {{ $isEditMode ? 'Update All Project Data' : 'Publish Project' }}
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: Sidebar --}}
                    <div class="col-lg-4">
                        <!-- Listing Thumbnail -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <label class="form-label fw-bold">Main Thumbnail <span class="text-danger">*</span></label>
                                <div class="text-center bg-light p-3 rounded mb-3">
                                    @if ($thumbnail)
                                    <img src="{{ $thumbnail->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                    @elseif ($current_thumbnail)
                                    <img src="{{ asset('storage/'.$current_thumbnail) }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                    @else
                                    <img src="{{ url('assets/frontend/images/banner/banner-user-image-three.png') }}" class="img-fluid opacity-50" style="max-height: 150px;">
                                    <p class="small text-muted mt-2">Placeholder</p>
                                    @endif
                                </div>
                                <input type="file" class="form-control form-control-sm" wire:model="thumbnail">
                                @error('thumbnail') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Main Project Image -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <label class="form-label fw-bold">Main Project Image (Feature)</label>
                                <div class="text-center bg-light p-3 rounded mb-3">
                                    @if ($project_image)
                                    <img src="{{ $project_image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                    @elseif ($current_project_image)
                                    <img src="{{ asset('storage/'.$current_project_image) }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                    @else
                                    <img src="{{ url('assets/frontend/images/banner/banner-user-image-three.png') }}" class="img-fluid opacity-50" style="max-height: 150px;">
                                    @endif
                                </div>
                                <input type="file" class="form-control form-control-sm" wire:model="project_image">
                            </div>
                        </div>

                        <!-- Project Metadata Card -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Client / Partner</label>
                                    <select class="form-select" wire:model="partner_id">
                                        <option value="">Select Client</option>
                                        @foreach($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Progress Status</label>
                                    <select class="form-select border-primary" wire:model="progress">
                                        <option value="planned">Planned</option>
                                        <option value="in-progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="on-hold">On Hold</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Technologies Used</label>
                                    <div class="p-2 border rounded bg-white" style="max-height: 150px; overflow-y: auto;">
                                        @foreach($technologies as $tech)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $tech->id }}" wire:model="selected_techs" id="tech{{ $tech->id }}">
                                            <label class="form-check-label small" for="tech{{ $tech->id }}">
                                                {{ $tech->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Tags (Comma separated)</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="tags" placeholder="UI, Laravel, App">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold small">Sort Order</label>
                                    <input type="number" class="form-control form-control-sm" wire:model="sort_order">
                                </div>

                                <div class="form-check form-switch p-3 bg-light rounded border">
                                    <input class="form-check-input ms-0 me-2" type="checkbox" id="pStatus" wire:model="status">
                                    <label class="form-check-label fw-bold small" for="pStatus">Public Visibility</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @if($isEditMode)
        <div class="tab-pane fade {{ $activeTab == 'tasks' ? 'show active' : '' }}">
            <livewire:admin.projects.task-hub :project_id="$project_id" />
        </div>

        <div class="tab-pane fade {{ $activeTab == 'files' ? 'show active' : '' }}">
            <livewire:admin.projects.asset-manager :project_id="$project_id" />
        </div>
        @endif
    </div>
</div>