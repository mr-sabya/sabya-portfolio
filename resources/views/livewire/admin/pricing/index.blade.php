<div class="">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Pricing Plans</h5>
            <div class="d-flex gap-2">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search plans...">
                <a href="{{ route('admin.pricing.create') }}" wire:navigate class="btn btn-primary text-nowrap">+ New Plan</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order</th>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plans as $plan)
                    <tr>
                        <td><span class="badge bg-secondary">{{ $plan->sort_order }}</span></td>
                        <td><span class="fw-bold">{{ $plan->name }}</span></td>
                        <td>{{ $plan->currency }} {{ $plan->price }} <small class="text-muted">/ {{ $plan->period_label }}</small></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:click="toggleFeatured({{ $plan->id }})" {{ $plan->is_featured ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            @if($plan->status)
                            <span class="badge bg-success-subtle text-success">Active</span>
                            @else
                            <span class="badge bg-danger-subtle text-danger">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.pricing.manage', $plan->id) }}" wire:navigate class="btn btn-sm btn-soft-primary"><i class="ri-edit-line"></i></a>
                            <button wire:confirm="Delete this plan?" wire:click="delete({{ $plan->id }})" class="btn btn-sm btn-soft-danger"><i class="ri-delete-bin-line"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="ri-information-line fs-1 d-block mb-2"></i>
                                <p class="mb-0">No pricing plans found.</p>
                                @if($search)
                                <small>Try adjusting your search for "{{ $search }}"</small>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white">{{ $plans->links() }}</div>
    </div>
</div>