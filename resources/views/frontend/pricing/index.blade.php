@extends('frontend.layouts.app')

@section('title', 'Pricing')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="Pricing"
    pageSubTitle="View my pricing plans" />
<!-- breadcrumb -->

<!-- pricing plan -->
<livewire:frontend.components.pricing-plan className="tmp-section-gapBottom" />
<!-- pricing plan -->

@endsection