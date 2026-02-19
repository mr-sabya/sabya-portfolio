<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Manage Experience & Counter Section</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateSection">

                        <div class="row">
                            <!-- Left Column: Experience Data -->
                            <div class="col-md-7 border-end">
                                <h6 class="text-secondary border-bottom pb-2 mb-3">Counter Highlights</h6>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Exp. Number</label>
                                            <input type="text" class="form-control" wire:model="exp_number" placeholder="e.g. 10+">
                                            @error('exp_number') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Highlight Title</label>
                                            <input type="text" class="form-control" wire:model="exp_title" placeholder="e.g. Years of Experience">
                                            @error('exp_title') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Full Description</label>
                                    <textarea class="form-control" rows="6" wire:model="exp_description" placeholder="Describe your professional journey..."></textarea>
                                    @error('exp_description') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Right Column: Section Image -->
                            <div class="col-md-5">
                                <h6 class="text-secondary border-bottom pb-2 mb-3">Section Image</h6>

                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        @if ($new_image)
                                        <div class="mb-3">
                                            <p class="small text-success fw-bold">New Image Preview:</p>
                                            <img src="{{ $new_image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                        </div>
                                        @elseif ($current_image)
                                        <div class="mb-3">
                                            <p class="small text-muted">Current Saved Image:</p>
                                            <img src="{{ asset('storage/'.$current_image) }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                        </div>
                                        @else
                                        <div class="mb-3">
                                            <img src="{{ url('assets/frontend/images/experiences/expert-img-two.jpg') }}" class="img-fluid opacity-50" style="max-height: 200px;">
                                            <p class="small text-muted mt-2">Placeholder Image</p>
                                        </div>
                                        @endif

                                        <div class="mt-3">
                                            <label class="form-label fw-bold">Update Featured Image</label>
                                            <input type="file" class="form-control" wire:model="new_image">
                                            <div wire:loading wire:target="new_image" class="text-primary small mt-1">
                                                <div class="spinner-border spinner-border-sm" role="status"></div> Uploading...
                                            </div>
                                            @error('new_image') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <div wire:loading wire:target="updateSection" class="spinner-border spinner-border-sm me-1"></div>
                                Save Section Info
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>