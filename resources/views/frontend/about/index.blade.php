@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="About Me"
    pageSubTitle="About Me" />
<!-- breadcrumb -->

<!-- service area -->
<livewire:frontend.components.service-area />
<!-- service area -->


<!-- skill area -->
<livewire:frontend.components.skill-area className="tmp-section-gapBottom" />
<!-- skill area -->

<!-- counter area -->
<livewire:frontend.components.counter-area />
<!-- counter area -->

<!-- education experience area -->
<livewire:frontend.components.education-experience-area />
<!-- education experience area -->


<!-- pricing plan -->
<livewire:frontend.components.pricing-plan className="tmp-section-gap"  />
<!-- pricing plan -->

<!-- get in touch -->
<livewire:frontend.components.get-in-touch className="tmp-section-gapBottom" />
<!-- get in touch -->

@endsection