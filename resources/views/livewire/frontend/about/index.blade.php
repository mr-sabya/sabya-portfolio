<div>
    <style>
        .ex-name{
            font-size: 1.5rem;
            font-weight: 600;
        }
    </style>
    @if($about)
    <section class="about-details-area tmp-section-gapBottom">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-thumb tmp-scroll-trigger tmp-zoom-in animation-order-1">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded-3">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">
                            {{ $about->title }}
                            <span><img src="{{ url('assets/frontend/images/custom-line/custom-line.png') }}" alt="line"></span>
                        </h2>
                        <p class="edu-para tmp-scroll-trigger tmp-fade-in animation-order-2">
                            {!! $about->description_one !!}
                        </p>
                        <p class="edu-para tmp-scroll-trigger tmp-fade-in animation-order-3">
                            {!! $about->description_two !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Mission & Vision -->
    <section class="mission-vision-area">
        <div class="container">
            <div class="row g-5">
                @foreach($missionVisions as $item)
                <div class="col-lg-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                        <h4 class="edu-sub-title">{{ $item->subtitle }}</h4>
                        <h2 class="edu-title">{{ $item->title }}</h2>
                        <p class="edu-para">{{ $item->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="core-values-area tmp-section-gap">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="custom-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    Work Ethics & Values
                    <span><img src="{{ url('assets/frontend/images/custom-line/custom-line.png') }}" alt="line"></span>
                </h2>
            </div>

            <div class="row g-4">
                @foreach($values as $value)
                <div class="col-lg-4 col-md-6">
                    <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                        <h2 class="ex-name">{{ $value->title }}</h2>
                        <p class="ex-para">{{ $value->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>