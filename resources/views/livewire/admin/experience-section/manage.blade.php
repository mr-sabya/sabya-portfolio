<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Experience Section Configuration</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateSection" enctype="multipart/form-data">

                        <div class="text-center mb-4">
                            <h6 class="text-secondary mb-3">Section Featured Image</h6>

                            <div class="card bg-light border shadow-none">
                                <div class="card-body">
                                    <!-- Image Preview Logic -->
                                    @if ($new_image)
                                    <div class="mb-3">
                                        <p class="small text-success fw-bold">New Image Preview:</p>
                                        <img src="{{ $new_image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                    </div>
                                    @elseif ($current_image)
                                    <div class="mb-3">
                                        <p class="small text-muted">Current Saved Image:</p>
                                        <img src="{{ asset('storage/'.$current_image) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                    </div>
                                    @else
                                    <div class="py-5 text-center">
                                        <i class="ri-image-line display-4 text-muted"></i>
                                        <p class="small text-muted mt-2">No image uploaded yet</p>
                                    </div>
                                    @endif

                                    <div class="mt-3">
                                        <label class="form-label fw-bold">Select New Image</label>
                                        <input type="file" class="form-control" wire:model="new_image">

                                        <!-- Uploading Indicator -->
                                        <div wire:loading wire:target="new_image" class="text-primary small mt-2">
                                            <div class="spinner-border spinner-border-sm" role="status"></div> Uploading to server...
                                        </div>

                                        @error('new_image') <span class="text-danger d-block small mt-1">{{ $message }}</span> @enderror
                                        <div class="form-text mt-2">Recommended size: 800x600px. Max 2MB (JPG, PNG, WebP).</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" {{ !$new_image ? 'disabled' : '' }}>
                                <span wire:loading.remove wire:target="updateSection">
                                    <i class="ri-save-line me-1"></i> Update Image
                                </span>
                                <span wire:loading wire:target="updateSection">
                                    <span class="spinner-border spinner-border-sm" role="status"></span> Saving...
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>