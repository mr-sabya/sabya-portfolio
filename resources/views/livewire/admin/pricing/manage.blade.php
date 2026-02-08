<div class="container-fluid py-4">
    <div class="card bg-primary text-white border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h3 class="text-white mb-1">{{ $plan_id ? 'Edit' : 'Create' }} Pricing Plan</h3>
                <p class="mb-0 opacity-75">Configure your subscription tiers and features</p>
            </div>
            <a href="{{ route('admin.pricing.index') }}" wire:navigate class="btn btn-light btn-sm">
                <i class="ri-arrow-left-line"></i> Back
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">PLAN NAME</label>
                            <input type="text" wire:model="name" class="form-control" placeholder="e.g. Premium">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">CURRENCY</label>
                            <input type="text" wire:model="currency" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold small">AMOUNT</label>
                            <input type="number" step="0.01" wire:model="price" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">PERIOD LABEL</label>
                            <input type="text" wire:model="period_label" class="form-control" placeholder="e.g. Per Month">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">PERIOD RANGE (FROM-TO)</label>
                            <input type="text" wire:model="period_range" class="form-control" placeholder="e.g. Jan 01 - Dec 31">
                        </div>
                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3 mt-4"><i class="ri-list-check me-2"></i> Plan Features</h6>
                    <div class="features-list">
                        @foreach($features as $index => $feature)
                        <div class="input-group mb-2" wire:key="feature-{{ $index }}">
                            <span class="input-group-text bg-white"><i class="fa-solid fa-circle-check text-success"></i></span>
                            <input type="text" wire:model="features.{{ $index }}" class="form-control" placeholder="Enter feature description...">
                            <button type="button" wire:click="removeFeature({{ $index }})" class="btn btn-outline-danger">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" wire:click="addFeature" class="btn btn-outline-primary mt-2">
                        + Add Feature
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">Configuration</div>
                <div class="card-body">
                    <div class="form-check form-switch p-3 bg-light rounded mb-3">
                        <input class="form-check-input ms-0 me-2" type="checkbox" wire:model="is_featured" id="isFeatured">
                        <label class="form-check-label fw-bold" for="isFeatured">Highlight Plan (Featured)</label>
                    </div>

                    <div class="form-check form-switch p-3 bg-light rounded mb-3">
                        <input class="form-check-input ms-0 me-2" type="checkbox" wire:model="status" id="active_status">
                        <label class="form-check-label fw-bold" for="active_status">Active Status</label>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold">SORT ORDER</label>
                        <input type="number" wire:model="sort_order" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Call to Action</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small fw-bold">BUTTON TEXT</label>
                        <input type="text" wire:model="button_text" class="form-control" placeholder="e.g. Subscribe Now">
                    </div>
                    <div class="mb-0">
                        <label class="small fw-bold">BUTTON URL</label>
                        <input type="text" wire:model="button_url" class="form-control" placeholder="e.g. Subscribe Now">
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button wire:click="store" class="btn btn-primary w-100 py-2">
                        <span wire:loading.remove>Save Plan</span>
                        <span wire:loading>Saving...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>