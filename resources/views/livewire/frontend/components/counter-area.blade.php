<!-- Tpm Counter Area Start -->
<section class="counter-area">
    <div class="container">
        <div class="row g-5">
            
            {{-- LEFT SIDE: Experience Section --}}
            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="year-of-expariance-wrapper bg-blur-style-one tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="year-expariance-wrap">
                        <h2 class="counter year-number">
                            <span class="odometer" data-count="{{ $section->exp_number ?? 25 }}">00</span>
                        </h2>
                        <h3 class="year-title">{!! nl2br(e($section->exp_title ?? 'Years Of experience')) !!}</h3>
                    </div>
                    <p class="year-para">
                        {{ $section->exp_description ?? 'Business consulting consultants provide expert advice...' }}
                    </p>
                </div>
            </div>

            {{-- RIGHT SIDE: Counter Grid --}}
            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="counter-area-right-content">
                    <div class="row g-5">
                        
                        @foreach($counters as $counter)
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="counter-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                                <h3 class="counter counter-title">
                                    {{-- Odometer Number --}}
                                    <span class="odometer" data-count="{{ $counter->number }}">00</span>
                                    {{-- Suffix (k+, etc) --}}
                                    {{ $counter->suffix }}
                                </h3>
                                <p class="counter-para">{{ $counter->title }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Tpm Counter Area End -->