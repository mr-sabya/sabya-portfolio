<?php

namespace App\Livewire\Admin\Pricing;

use App\Models\PricingPlan;
use Livewire\Component;

class Manage extends Component
{
    public $plan_id, $name, $price, $currency = '$', $period_label = 'Per Month';
    public $period_range, $is_featured = false, $status = true;
    public $button_text = 'Get Started', $button_url = 'contact.html', $sort_order = 0;

    // Dynamic features list
    public $features = [];

    public function mount($id = null)
    {
        if ($id) {
            $plan = PricingPlan::findOrFail($id);
            $this->plan_id      = $plan->id;
            $this->name         = $plan->name;
            $this->price        = $plan->price;
            $this->currency     = $plan->currency;
            $this->period_label = $plan->period_label;
            $this->period_range = $plan->period_range;
            $this->is_featured  = $plan->is_featured;
            $this->status       = $plan->status;
            $this->button_text  = $plan->button_text;
            $this->button_url   = $plan->button_url;
            $this->sort_order   = $plan->sort_order;
            $this->features     = $plan->features ?? [];
        } else {
            // Default: start with 3 empty feature slots
            $this->features = ['', '', ''];
        }
    }

    public function addFeature()
    {
        $this->features[] = '';
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
    }

    public function store()
    {
        $this->validate([
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric',
            'currency'     => 'required|string|max:10',
            'period_label' => 'required|string',
            'features'     => 'required|array|min:1',
            'features.*'   => 'required|string'
        ]);

        PricingPlan::updateOrCreate(['id' => $this->plan_id], [
            'name'         => $this->name,
            'price'        => $this->price,
            'currency'     => $this->currency,
            'period_label' => $this->period_label,
            'period_range' => $this->period_range,
            'is_featured'  => $this->is_featured,
            'status'       => $this->status,
            'button_text'  => $this->button_text,
            'button_url'   => $this->button_url,
            'sort_order'   => $this->sort_order,
            'features'     => $this->features,
        ]);

        session()->flash('success', 'Pricing plan saved!');
        return redirect()->route('admin.pricing.index');
    }

    public function render()
    {
        return view('livewire.admin.pricing.manage');
    }
}
