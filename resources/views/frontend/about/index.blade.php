@extends('frontend.layouts.app')

@section('title', 'About Me')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="About Me"
    pageSubTitle="About Me" />
<!-- breadcrumb -->

<!-- service area -->
<livewire:frontend.components.service-area />
<!-- service area -->

<!-- about us area -->
<livewire:frontend.about.index />
<!-- about us area -->

<!-- skill area -->
<livewire:frontend.components.skill-area className="tmp-section-gapBottom" />
<!-- skill area -->


<!-- counter area -->
<livewire:frontend.components.counter-area />
<!-- counter area -->

<!-- education experience area -->
<livewire:frontend.components.education-experience-area />
<!-- education experience area -->


@endsection