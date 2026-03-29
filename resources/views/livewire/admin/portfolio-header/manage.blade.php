<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Manage Portfolio Header Section</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateHeader">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Subtitle</label>
                            <input type="text" class="form-control" wire:model="subtitle" placeholder="e.g. Latest Portfolio">
                            @error('subtitle') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Main Title</label>
                            <input type="text" class="form-control" wire:model="title" placeholder="e.g. Transforming Ideas into Exceptional Results">
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" rows="5" wire:model="description" placeholder="Enter portfolio section description..."></textarea>
                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <span wire:loading wire:target="updateHeader" class="spinner-border spinner-border-sm me-1"></span>
                                Save Portfolio Header
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="card mt-4 bg-light border-dashed">
                <div class="card-body">
                    <h6 class="text-muted mb-3"><i class="bi bi-eye"></i> Live Preview:</h6>
                    <div class="text-center">
                        <span class="text-primary text-uppercase fw-bold small">{{ $subtitle ?? 'SUBTITLE HERE' }}</span>
                        <h2 class="fw-bold mt-2">{{ $title ?? 'MAIN TITLE HERE' }}</h2>
                        <p class="text-muted mx-auto" style="max-width: 600px;">{{ $description ?? 'Description will appear here...' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>