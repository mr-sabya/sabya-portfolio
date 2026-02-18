@extends('frontend.layouts.app')

@section('content')
<!-- tmp banner area start -->
<livewire:frontend.home.banner />
<!-- tmp banner area end -->

<!-- service area -->
<livewire:frontend.components.service-area />
<!-- service area -->

<!-- counter area -->
<livewire:frontend.components.counter-area />
<!-- counter area -->

<!-- latest service area -->
<livewire:frontend.components.latest-service-area pageName="home" />
<!-- latest service area -->

<!-- skill area -->
<livewire:frontend.components.skill-area className="tmp-section-gapTop" />
<!-- skill area -->

<!-- education experience area -->
<livewire:frontend.components.education-experience-area />
<!-- education experience area -->

<!-- company area -->
<livewire:frontend.components.company-area />
<!-- company area -->

<livewire:frontend.home.portfolio />


<!-- testimonial area -->
<livewire:frontend.components.testimonial-area />
<!-- testimonial area -->

<!-- blog area -->
<livewire:frontend.components.blog-area />
<!-- blog area -->

@endsection