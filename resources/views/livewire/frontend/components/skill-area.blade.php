<!-- tmp skill area start -->
<div class="tmp-skill-area {{ $className ?? '' }}">
    <div class="container">
        <div class="row g-5">

            @foreach($skillCategories as $category)
            <div class="col-lg-6">
                <div class="progress-wrapper">
                    <div class="content">
                        <h2 class="custom-title mb--30 tmp-scroll-trigger tmp-fade-in animation-order-1">
                            {{ $category->title }}
                            <span><img src="{{ url('assets/frontend/images/custom-line/custom-line.png') }}" alt="custom-line"></span>
                        </h2>

                        @foreach($category->skills as $skill)
                        <!-- Start Single Progress Charts -->
                        <div class="progress-charts">
                            <h6 class="heading heading-h6">{{ $skill->name }}</h6>
                            <div class="progress">
                                {{--
                                    Dynamic Animation Delay:
                                    We start at 0.3s and add 0.1s for each item in the loop 
                                --}}
                                @php
                                $delay = 0.3 + ($loop->index * 0.1);
                                @endphp

                                <div class="progress-bar wow fadeInLeft"
                                    data-wow-duration="{{ 0.5 + ($loop->index * 0.1) }}s"
                                    data-wow-delay="{{ $delay }}s"
                                    role="progressbar"
                                    style="width: {{ $skill->percent }}%; visibility: visible; animation-duration: {{ 0.5 + ($loop->index * 0.1) }}s; animation-delay: {{ $delay }}s; animation-name: fadeInLeft;"
                                    aria-valuenow="{{ $skill->percent }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                    <span class="percent-label">{{ $skill->percent }}%</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Progress Charts -->
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- tmp skill area end -->