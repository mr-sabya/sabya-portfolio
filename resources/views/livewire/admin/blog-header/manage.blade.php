<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Blog Section Header</h5>
                    <span class="badge bg-soft-info text-info">Blog & News</span>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateHeader">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Subtitle</label>
                            <input type="text" class="form-control" wire:model="subtitle" placeholder="e.g. Blog and news">
                            @error('subtitle') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Main Title</label>
                            <input type="text" class="form-control" wire:model="title" placeholder="e.g. Elevating Personal Branding through Powerful Portfolios">
                            <small class="text-muted">Use <code>&lt;br&gt;</code> if you want to force a line break.</small>
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4 pt-2 border-top d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <span wire:loading wire:target="updateHeader" class="spinner-border spinner-border-sm me-1"></span>
                                Save Blog Header
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Preview UI -->
            <div class="card mt-4 bg-light border-dashed">
                <div class="card-body py-5 text-center">
                    <div class="section-head">
                        <div class="section-sub-title mb-2">
                            <span class="subtitle text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">
                                {{ $subtitle ?? 'Blog and news' }}
                            </span>
                        </div>
                        <h2 class="title fw-bold">
                            {!! $title ?? 'Elevating Personal Branding <br> through Powerful Portfolios' !!}
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>