<!-- Tpm Service Area Start -->
<section class="service-area tmp-section-gap">
    <div class="container">
        <div class="row justify-content-center">

            @forelse($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6">
                {{--
                    Dynamic Animation Order: 
                    Uses $loop->iteration (1, 2, 3...) to delay animations sequentially.
                --}}
                <div class="service-card-v1 tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }} tmp-link-animation">
                    <div class="service-card-icon">
                        {{-- Dynamic Icon Class from DB (e.g., 'fa-light fa-pen-ruler') --}}
                        <i class="{{ $service->icon_class }}"></i>
                    </div>
                    <h4 class="service-title">
                        <a href="{{ $service->details_url ?? '#' }}">{{ $service->title }}</a>
                    </h4>
                    {{-- Displays the short description/stat (e.g., "120 Projects") --}}
                    <p class="service-para">{{ $service->short_description }}</p>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No services found.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
<!-- Tpm Service Area End -->