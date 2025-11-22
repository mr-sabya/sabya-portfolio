@extends('frontend.layouts.app')

@section('content')

<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="My Services"
    pageSubTitle="Service" />
<!-- breadcrumb -->

<!-- latest service area -->
<livewire:frontend.components.latest-service-area pageName="service" />
<!-- latest service area -->

<!-- pricing plan -->
<livewire:frontend.components.pricing-plan className="tmp-section-gapBottom" />
<!-- pricing plan -->


<!-- get in touch -->
<livewire:frontend.components.get-in-touch className="tmp-section-gapBottom" />
<!-- get in touch -->

@endsection