<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Testimonial Section Header</h5>
                    <span class="badge bg-soft-primary text-primary">Testimonials</span>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateHeader">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Subtitle</label>
                            <input type="text" class="form-control" wire:model="subtitle" placeholder="e.g. Our Testimonial">
                            @error('subtitle') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Main Title</label>
                            <input type="text" class="form-control" wire:model="title" placeholder="e.g. Enhancing Collaboration between Remote">
                            <small class="text-muted">Tip: You can use HTML like <code>&lt;br&gt;</code> for line breaks.</small>
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4 pt-2 border-top d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <span wire:loading wire:target="updateHeader" class="spinner-border spinner-border-sm me-1"></span>
                                Update Section
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="card mt-4 border-dashed bg-light">
                <div class="card-body text-center py-5">
                    <div class="section-head">
                        <div class="section-sub-title mb-2">
                            <span class="subtitle text-primary fw-bold text-uppercase" style="letter-spacing: 1px;">
                                {{ $subtitle ?? 'Our Testimonial' }}
                            </span>
                        </div>
                        <h2 class="title fw-bold">
                            {!! $title ?? 'Enhancing Collaboration <br> between Remote' !!}
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>