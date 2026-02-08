<div class="tpm-custom-box-bg">
    <!-- Tpm Latest Portfolio Area Start -->
    <div class="latest-portfolio-area custom-column-grid">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Portfolio</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Transforming Ideas into Exceptional Results</h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">
                    Discover our latest works where we help businesses improve their performance, efficiency, and organizational growth through expert advice and innovative solutions.
                </p>
            </div>

            <div class="row">
                @forelse($projects as $project)
                <div class="col-lg-6 col-md-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                {{-- Assuming you have a route named project.details --}}
                                <a href="#">
                                    @if($project->thumbnail)
                                    <img class="img-primary hidden-on-mobile" src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                                    <img class="img-secondary" src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                                    @else
                                    <img class="img-primary" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-1.jpg') }}" alt="Placeholder">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title">
                                    <a class="link" href="#">{{ $project->title }}</a>
                                </h3>
                                {{-- Display Client Name as the sub-text --}}
                                <p class="portfoli-card-para">{{ $project->client->name ?? 'Development' }}</p>
                            </div>
                            <a href="#" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No projects available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Tpm Latest Portfolio Area End -->
</div>