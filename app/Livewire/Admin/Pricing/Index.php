<?php

namespace App\Livewire\Admin\Pricing;

use App\Models\PricingPlan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function delete($id)
    {
        PricingPlan::findOrFail($id)->delete();
        session()->flash('error', 'Pricing plan deleted.');
    }

    public function toggleFeatured($id)
    {
        $plan = PricingPlan::findOrFail($id);
        $plan->update(['is_featured' => !$plan->is_featured]);
    }

    public function render()
    {
        return view('livewire.admin.pricing.index', [
            'plans' => PricingPlan::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('sort_order', 'asc')
                ->paginate(10)
        ]);
    }
}
