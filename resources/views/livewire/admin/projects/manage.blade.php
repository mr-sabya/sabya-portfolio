<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h4>{{ $isEditMode ? 'Edit Project' : 'Create New Project' }}</h4>
        <a href="{{ route('admin.projects.index') }}" wire:navigate class="btn btn-secondary">
            <i class="ri-arrow-left-line"></i> Back to List
        </a>
    </div>
    <div class="mb-3">
        <form wire:submit.prevent="store">
            <div class="card-body">
                <div wire:loading.block wire:target="edit" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>

                <div wire:loading.remove wire:target="edit">
                    <div class="row g-4">

                        {{-- Left Column: Project Details --}}
                        <div class="col-lg-8 border-end">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Project Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="title" placeholder="e.g. Supporting Health Initiatives">
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
                                    <label class="form-label fw-bold">Project Progress (Tracking)</label>
                                    <select class="form-select border-primary" wire:model="progress">
                                        <option value="planned">Planned</option>
                                        <option value="in-progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="on-hold">On Hold</option>
                                    </select>
                                </div>



                                <div class="col-12">
                                    <label class="form-label fw-bold">Primary Description</label>
                                    <livewire:quill-text-editor
                                        wire:model.live="description_one"
                                        theme="snow" />
                                </div>

                                {{-- Multi-Gallery Section --}}
                                <div class="col-12">
                                    <label class="form-label fw-bold">Gallery Swiper Images</label>
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            {{-- New Gallery Previews --}}
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

                                            {{-- Existing Gallery Management --}}
                                            @if($isEditMode && count($projects->find($project_id)->gallery) > 0)
                                            <div class="mb-3">
                                                <p class="small text-muted fw-bold">Current Gallery (Click X to delete):</p>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach($projects->find($project_id)->gallery as $img)
                                                    <div class="position-relative">
                                                        <img src="{{ asset('storage/'.$img->image_path) }}" class="rounded border" style="width: 100px; height: 70px; object-fit: cover;">
                                                        <button type="button" wire:click="deleteImage({{ $img->id }})" class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0 shadow-sm" style="width:20px;height:20px; line-height:1;">&times;</button>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            <input type="file" class="form-control" wire:model="gallery_images" multiple>
                                            <div wire:loading wire:target="gallery_images" class="text-primary small mt-1">
                                                <div class="spinner-border spinner-border-sm" role="status"></div> Uploading gallery files...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Thumbnail & Sidebar Info --}}
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Main Thumbnail <span class="text-danger">*</span></label>
                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        @if ($thumbnail)
                                        <div class="mb-3">
                                            <p class="small text-success fw-bold">New Thumbnail Preview:</p>
                                            <img src="{{ $thumbnail->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                        </div>
                                        @elseif ($current_thumbnail)
                                        <div class="mb-3">
                                            <p class="small text-muted fw-bold">Current Thumbnail:</p>
                                            <img src="{{ asset('storage/'.$current_thumbnail) }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                        </div>
                                        @else
                                        <div class="mb-3 py-4">
                                            <i class="ri-image-line display-4 text-muted opacity-50"></i>
                                            <p class="small text-muted mt-2">No Image Selected</p>
                                        </div>
                                        @endif

                                        <div class="mt-3 text-start">
                                            <input type="file" class="form-control" wire:model="thumbnail">
                                            <div wire:loading wire:target="thumbnail" class="text-primary small mt-1">
                                                <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                            </div>
                                            @error('thumbnail') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Technologies Used <span class="text-danger">*</span></label>
                                <div class="p-2 border rounded bg-white" style="max-height: 120px; overflow-y: auto;">
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
            <div class="card-footer bg-light text-end p-2">
                <button type="submit" class="btn btn-primary px-5">
                    <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Project' : 'Publish Project' }}</span>
                    <span wire:loading wire:target="store">Processing...</span>
                </button>
            </div>
        </form>
    </div>
</div>