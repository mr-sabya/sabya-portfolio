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
<livewire:frontend.components.skill-area />
<!-- skill area -->

<!-- counter area -->
<livewire:frontend.components.counter-area />
<!-- counter area -->

<!-- education experience area -->
<livewire:frontend.components.education-experience-area />
<!-- education experience area -->


<!-- pricing plan -->
<livewire:frontend.components.pricing-plan />
<!-- pricing plan -->

<!-- get in touch -->
<livewire:frontend.components.get-in-touch />
<!-- get in touch -->

@endsection