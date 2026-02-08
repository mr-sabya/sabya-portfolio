<div class="container-fluid py-4">
    <!-- Header -->
    <div class="card bg-primary text-white border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h3 class="text-white mb-1">{{ $title ?: 'New Blog Post' }}</h3>
                <p class="mb-0 opacity-75">Build dynamic content and manage SEO</p>
            </div>
            <a href="{{ route('admin.posts.index') }}" wire:navigate class="btn btn-light btn-sm ms-3">
                <i class="ri-arrow-left-line"></i> Back to List
            </a>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav nav-pills mb-4 bg-white p-2 rounded shadow-sm border">
        <li class="nav-item">
            <button wire:click="$set('activeTab', 'details')" class="nav-link {{ $activeTab == 'details' ? 'active' : '' }}">
                <i class="ri-article-line me-1"></i> Post Content
            </button>
        </li>
        <li class="nav-item">
            <button wire:click="$set('activeTab', 'seo')" class="nav-link {{ $activeTab == 'seo' ? 'active' : '' }}">
                <i class="ri-search-eye-line me-1"></i> SEO & Social
            </button>
        </li>
    </ul>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="tab-content">
                <!-- CONTENT TAB -->
                @if($activeTab == 'details')
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Post Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model.live="title" placeholder="How to build...">
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                                <select class="form-select border-primary" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Dynamic Block Loop -->
                        <div class="dynamic-blocks mt-4">
                            @foreach($blocks as $index => $block)
                            <div class="card border border-light-subtle mb-3 shadow-none bg-light-subtle" wire:key="block-{{ $index }}">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-2">
                                    <span class="badge bg-dark text-white uppercase">{{ $block['type'] }} BLOCK</span>
                                    <button type="button" wire:click="removeBlock({{ $index }})" class="btn btn-sm btn-outline-danger border-0">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                                <div class="card-body bg-white">
                                    @if($block['type'] === 'text')
                                    <livewire:quill-text-editor wire:model.live="blocks.{{ $index }}.data.body" wire:key="quill-{{ $index }}" theme="snow" />
                                    @elseif($block['type'] === 'code')
                                    <select wire:model="blocks.{{ $index }}.data.lang" class="form-select form-select-sm mb-2 w-25">
                                        <option value="javascript">JavaScript</option>
                                        <option value="php">PHP</option>
                                        <option value="python">Python</option>
                                        <option value="html">HTML</option>
                                    </select>
                                    <textarea wire:model="blocks.{{ $index }}.data.code" class="form-control font-monospace bg-dark text-white" rows="6" placeholder="Paste code..."></textarea>
                                    @elseif($block['type'] === 'image')
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <!-- Dynamic Block Image Preview (Following your pattern) -->
                                            <div class="border rounded p-2 text-center bg-light">
                                                @if(isset($block['data']['temp_image']))
                                                <img src="{{ $block['data']['temp_image']->temporaryUrl() }}" class="img-fluid rounded border" style="max-height: 150px;">
                                                @elseif($block['data']['url'])
                                                <img src="{{ asset('storage/'.$block['data']['url']) }}" class="img-fluid rounded border" style="max-height: 150px;">
                                                @else
                                                <div class="py-4 text-muted"><i class="ri-image-line display-6"></i><br>No Image</div>
                                                @endif
                                            </div>
                                            <input type="file" wire:model="blocks.{{ $index }}.data.temp_image" class="form-control form-control-sm mt-2">
                                        </div>
                                        <div class="col-md-7">
                                            <label class="small fw-bold">Caption</label>
                                            <input type="text" wire:model="blocks.{{ $index }}.data.caption" class="form-control" placeholder="Image description...">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Add Block Buttons -->
                        <div class="p-4 border-2 border-dashed rounded text-center bg-light">
                            <p class="small fw-bold text-muted mb-3 uppercase">Add New Content Block</p>
                            <div class="btn-group shadow-sm">
                                <button type="button" wire:click="addBlock('text')" class="btn btn-white border"><i class="ri-paragraph me-1"></i> Text</button>
                                <button type="button" wire:click="addBlock('image')" class="btn btn-white border"><i class="ri-image-add-line me-1"></i> Image</button>
                                <button type="button" wire:click="addBlock('code')" class="btn btn-white border"><i class="ri-code-box-line me-1"></i> Code</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- SEO TAB -->
                @if($activeTab == 'seo')
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Meta Title</label>
                                <input type="text" wire:model="meta_title" class="form-control" placeholder="SEO Title">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Meta Description</label>
                                <textarea wire:model="meta_description" class="form-control" rows="3" placeholder="Search engine description"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Keywords</label>
                                <input type="text" wire:model="meta_keywords" class="form-control" placeholder="comma, separated, keywords">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">OG Image (Social Sharing)</label>
                                <div class="border rounded p-2 text-center mb-2">
                                    @if($og_image) <img src="{{ $og_image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 150px;">
                                    @elseif($current_og_image) <img src="{{ asset('storage/'.$current_og_image) }}" class="img-fluid rounded" style="max-height: 150px;">
                                    @else <p class="text-muted py-4 mb-0">No OG Image</p> @endif
                                </div>
                                <input type="file" wire:model="og_image" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- SIDEBAR (Includes requested Image Pattern) -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">Main Thumbnail</div>
                <div class="card-body text-center">

                    <!-- Image Preview Logic (AS REQUESTED) -->
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
                    <div class="mb-3 text-center">
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

            <!-- Status Settings -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">Publish Settings</div>
                <div class="card-body">
                    <div class="form-check form-switch p-3 bg-light rounded mb-3">
                        <input class="form-check-input ms-0 me-2" type="checkbox" id="pStatus" wire:model="status">
                        <label class="form-check-label fw-bold" for="pStatus">Published Status</label>
                    </div>

                    <div class="mb-2">
                        <label class="small fw-bold">Slug Preview</label>
                        <input type="text" class="form-control form-control-sm bg-light" value="{{ Str::slug($title) }}" readonly>
                    </div>
                </div>
                <div class="card-footer bg-white border-top">
                    <button type="button" wire:click="store" class="btn btn-primary w-100 py-2 shadow-sm">
                        <span wire:loading.remove wire:target="store">{{ $isEditMode ? 'Update Post' : 'Publish Post' }}</span>
                        <span wire:loading wire:target="store">
                            <div class="spinner-border spinner-border-sm"></div> Saving...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>