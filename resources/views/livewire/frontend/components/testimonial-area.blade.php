<!-- Tpm Testimonial Area Start -->
<section class="testimonial-area tmp-section-gapTop">
    <div class="container">
        <div class="section-head mb--50">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">Our Testimonial</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Enhancing Collaboration <br> between Remote</h2>
        </div>
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="swiper-testimonials-area-wrapper-card">
                    <div class="swiper swiper-testimonials-2">
                        <div class="swiper-wrapper">

                            @forelse($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-card tmponhover style-2 tmp-scroll-trigger animation-order-{{ $loop->iteration }}">
                                    <div class="content">
                                        <div class="testimonital-icon">
                                            <img src="{{ asset('assets/frontend/images/icons/quote.svg') }}" alt="testimonial-icon">
                                        </div>
                                        <!-- Review Text -->
                                        <h2 class="text-doc">
                                            {{ $testimonial->comment }}
                                        </h2>
                                        <!-- Client Name -->
                                        <h3 class="card-title">{{ $testimonial->client_name }}</h3>
                                        <!-- Designation -->
                                        <p class="card-para">{{ $testimonial->client_designation }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <!-- Empty State Design -->
                            <div class="swiper-slide">
                                <div class="testimonial-card text-center py-5">
                                    <h4 class="text-muted">No testimonials yet.</h4>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tpm Testimonial Area End -->