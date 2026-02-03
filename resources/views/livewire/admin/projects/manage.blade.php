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

    <div class="tab-content">
        <!-- DETAILS TAB: Primary Form -->
        <div class="tab-pane {{ $activeTab == 'details' ? 'show active' : '' }}">
            <form wire:submit.prevent="store">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div wire:loading.block wire:target="mount" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div wire:loading.remove wire:target="mount">
                            <div class="row g-4">
                                {{-- Left Column --}}
                                <div class="col-lg-8 border-end">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold">Project Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" wire:model="title" placeholder="Supporting Health Initiatives">
                                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Client / Partner <span class="text-danger">*</span></label>
                                            <select class="form-select" wire:model="partner_id">
                                                <option value="">Select Client</option>
                                                @foreach($partners as $partner)
                                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('partner_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Project Progress</label>
                                            <select class="form-select border-primary" wire:model="progress">
                                                <option value="planned">Planned</option>
                                                <option value="in-progress">In Progress</option>
                                                <option value="completed">Completed</option>
                                                <option value="on-hold">On Hold</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold">Primary Description</label>
                                            <livewire:quill-text-editor wire:model.live="description_one" theme="snow" />
                                            @error('description_one') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold">Gallery Swiper Images</label>
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

                                {{-- Right Column --}}
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Main Thumbnail <span class="text-danger">*</span></label>
                                        <div class="card bg-light border-0">
                                            <div class="card-body text-center">

                                                <!-- Image Preview Logic -->
                                                @if ($thumbnail)
                                                <div class="mb-3">
                                                    <p class="small text-success fw-bold">New Image Preview:</p>
                                                    <img src="{{ $thumbnail->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                                </div>
                                                @elseif ($current_thumbnail)
                                                <div class="mb-3">
                                                    <p class="small text-muted fw-bold">Current Image:</p>
                                                    <img src="{{ asset('storage/'.$current_thumbnail) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                                </div>
                                                @else
                                                <div class="mb-3">
                                                    <img src="{{ url('assets/frontend/images/banner/banner-user-image-three.png') }}" class="img-fluid opacity-50" style="max-height: 200px;">
                                                    <p class="small text-muted mt-2">Default Placeholder Shown</p>
                                                </div>
                                                @endif

                                                <div class="mt-3 text-start">
                                                    <label class="form-label fw-bold small">Upload New Image</label>
                                                    <input type="file" class="form-control" wire:model="thumbnail">

                                                    <div wire:loading wire:target="thumbnail" class="text-primary small mt-1">
                                                        <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                                    </div>

                                                    @error('thumbnail') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Other sidebar fields like Tech Stack, Date, Status, etc. -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Technologies Used <span class="text-danger">*</span></label>
                                        <div class="p-2 border rounded bg-white" style="max-height: 150px; overflow-y: auto;">
                                            @foreach($technologies as $tech)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $tech->id }}" wire:model="selected_techs" id="tech{{ $tech->id }}">
                                                <label class="form-check-label" for="tech{{ $tech->id }}">
                                                    <img src="{{ asset('storage/'.$tech->icon) }}" width="15" class="me-1"> {{ $tech->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('selected_techs') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Completion Date</label>
                                        <input type="date" class="form-control" wire:model="project_date">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tags</label>
                                        <input type="text" class="form-control" wire:model="tags" placeholder="e.g. Design, App, React">
                                    </div>

                                    <div class="form-check form-switch p-3 bg-light rounded">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" id="pStatus" wire:model="status">
                                        <label class="form-check-label fw-bold" for="pStatus">Public Visibility</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top text-end p-3">
                        <button type="submit" class="btn btn-primary px-5">
                            <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Project Details' : 'Publish Project' }}</span>
                            <span wire:loading wire:target="store">Processing...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if($isEditMode)
        <!-- TASKS TAB: Task Hub Component -->
        <div class="tab-pane {{ $activeTab == 'tasks' ? 'show active' : '' }}">
            <livewire:admin.projects.task-hub :project_id="$project_id" />
        </div>

        <!-- FILES TAB: Asset Manager Component -->
        <div class="tab-pane {{ $activeTab == 'files' ? 'show active' : '' }}">
            <livewire:admin.projects.asset-manager :project_id="$project_id" />
        </div>
        @endif
    </div>
</div>