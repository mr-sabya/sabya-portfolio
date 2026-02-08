<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    //
    public function index()
    {
        return view('admin.pricing.index');
    }

    // create
    public function create()
    {
        return view('admin.pricing.create');
    }

    // edit
    public function edit($id)
    {
        $pricing = PricingPlan::find($id);
        return view('admin.pricing.edit', compact('pricing'));
    }
}
