<!-- Tpm My Price plan Start -->
<section class="our-price-plan-area {{ $className }}">
    <div class="container">
        <div class="section-head mb--50">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">My Price plan</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Enhancing Collaboration <br> between Remote</h2>
        </div>
        <div class="row align-items-center g-5 justify-content-center">
            @forelse($plans as $plan)
            <div class="col-lg-4 col-md-6">
                <div class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in 
                            animation-order-{{ $loop->iteration }} 
                            {{ $plan->is_featured ? 'active' : '' }}">

                    <span class="price-sub-title">{{ $plan->name }}</span>
                    <h3 class="main-price">{{ $plan->currency }} {{ number_format($plan->price, 2) }}</h3>

                    {{-- Period logic: Shows "Per Month" and optional "From-To" range --}}
                    <p class="per-month">
                        {{ $plan->period_label }}
                        @if($plan->period_range)
                        <br><small class="text-muted">{{ $plan->period_range }}</small>
                        @endif
                    </p>

                    <div class="check-box">
                        <ul>
                            @foreach($plan->features as $feature)
                            <li>
                                <div class="check-box-item">
                                    <div class="box-icon">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>
                                    <p class="box-para">{{ $feature }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tmp-button-here">
                        <a class="tmp-btn hover-icon-reverse btn-md radius-round {{ $plan->is_featured ? '' : 'btn-border' }}"
                            href="{{ $plan->button_url }}">
                            <span class="icon-reverse-wrapper">
                                <span class="btn-text">{{ $plan->button_text }}</span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 border rounded bg-light">
                    <i class="fa-solid fa-tags display-4 text-muted mb-3"></i>
                    <h4 class="text-muted">No pricing plans available at the moment.</h4>
                    <p>Please check back later or contact us for custom quotes.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Tpm My Price plan End -->