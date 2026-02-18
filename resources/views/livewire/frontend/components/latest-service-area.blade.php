<section class="latest-service-area {{ $pageName == 'home'? 'tmp-section-gapTop' : 'tmp-section-gap' }}">

    {{-- =============================================
         LAYOUT 1: HOME PAGE
         (Left: 3 Items List, Right: Big Image)
         ============================================= --}}
    @if($pageName === 'home')
    <div class="container">
        <!-- Section Header -->
        <div class="section-head mb--60">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">{{ $sectionInfo->sub_title ?? 'Latest Service' }}</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">
                {{ $sectionInfo->title ?? 'Inspiring The World One Project' }}
            </h2>
            <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">
                {{ $sectionInfo->description ?? 'We provide expert advice...' }}
            </p>
        </div>

        <div class="row">
            <!-- Left Column: Top 3 Services -->
            <div class="col-lg-6">
                @foreach($services as $service)
                <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    <h2 class="service-card-num">
                        {{-- Generate 01., 02., 03. --}}
                        <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</span>
                        {{ $service->title }}
                    </h2>
                    <p class="service-para">
                        {{ $service->description ?? $service->short_description }}
                    </p>
                </div>
                @endforeach
            </div>

            <!-- Right Column: Featured Image -->
            <div class="col-lg-6">
                <div class="service-card-user-image">
                    @php
                    $imagePath = !empty($sectionInfo->featured_image)
                    ? asset('storage/' . $sectionInfo->featured_image)
                    : url('assets/frontend/images/services/latest-services-user-image-two.png');
                    @endphp
                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1"
                        src="{{ $imagePath }}"
                        alt="latest-user-image">
                </div>
            </div>
        </div>
    </div>

    {{-- =============================================
         LAYOUT 2: SERVICE PAGE
         (Two Columns of Services: Left & Right)
         ============================================= --}}
    @elseif($pageName === 'service')
    <div class="container">
        <div class="row">
            {{--
               Logic: Split services into 2 evenly balanced collections (Left Col / Right Col) 
               Using Laravel's split(2) method.
            --}}
            @foreach($services->split(2) as $chunk)
            <div class="col-lg-6 col-sm-6">
                @foreach($chunk as $key => $service)
                <div
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    <h2 class="service-card-num">
                        {{--
                                   Numbering Logic:
                                   Since $key is the index from the original collection (0,1,2,3,4,5),
                                   we just add 1 to get continuous numbering (01, 02, ... 06) across columns.
                                --}}
                        <span>{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                        {{ $service->title }}
                    </h2>
                    <p class="service-para">
                        {{ $service->description ?? 'No description available.' }}
                    </p>
</div>
                @endforeach
            </div>
            @endforeach

            @if($services->isEmpty())
            <div class="col-12 text-center">
                <p>No services found.</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</section>