<!-- Tpm Education Experience Area Start -->
<section class="education-experience tmp-section-gapTop">
    <div class="container">

        {{-- SECTION 1: EDUCATION --}}
        <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">
            Education
            <span><img src="{{ url('assets/frontend/images/custom-line/custom-line.png') }}" alt="custom-line"></span>
        </h2>

        <div class="row g-5">
            @foreach($educations as $edu)
            <div class="col-lg-6 col-sm-6">
                <div class="education-experience-card tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    <h4 class="edu-sub-title">{{ $edu->designation }}</h4>
                    <h2 class="edu-title">{{ $edu->duration }}</h2>
                    <p class="edu-para">{{ $edu->description }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- SECTION 2: EXPERIENCE --}}
        <div class="experiences-wrapper v2">
            <div class="row">

                {{-- Left Side: Image (Loaded from ExperienceSection Model) --}}
                <div class="col-lg-6">
                    <div class="experiences-wrap-right-content">
                        @php
                        $expImage = !empty($sectionInfo->experience_image)
                        ? asset('storage/'.$sectionInfo->experience_image)
                        : url('assets/frontend/images/experiences/expert-img-two.jpg');
                        @endphp
                        <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1"
                            src="{{ $expImage }}"
                            alt="expert-img">
                    </div>
                </div>

                {{-- Right Side: Experience List --}}
                <div class="col-lg-6">
                    <div class="experiences-wrap-left-content">

                        <h2 class="custom-title mb-32 tmp-scroll-trigger tmp-fade-in animation-order-1">
                            Experiences
                            <span><img src="{{ url('assets/frontend/images/custom-line/custom-line.png') }}" alt="custom-line"></span>
                        </h2>

                        @foreach($experiences as $exp)
                        <div class="experience-content tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                            <p class="ex-subtitle">{{ $exp->subtitle }}</p>
                            <h2 class="ex-name">{{ $exp->name }}</h2>
                            <h3 class="ex-title">{{ $exp->designation }} - ({{ $exp->duration }})</h3>
                            <p class="ex-para">{{ $exp->description }}</p>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tpm Education Experience Area End -->