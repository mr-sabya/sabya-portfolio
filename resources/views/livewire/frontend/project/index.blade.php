<section class="latest-portfolio-area custom-column-grid tmp-section-gap">
    <div class="container">
        <div class="latest-portfolio-tabs-area">
            <div class="bg-blur-style-one">
                <div class="row g-5">
                    @forelse($projects as $project)
                    <div class="col-lg-6">
                        <div class="latest-portfolio-card-style-two image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                            <div class="portfoli-card-img">
                                <div class="img-box v2">
                                    <a class="tmp-scroll-trigger tmp-zoom-in" href="{{ route('projects.show', $project->slug) }}" wire:navigate>
                                        <img class="w-100" src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                                    </a>
                                </div>
                            </div>
                            <div class="portfolio-card-content-wrap">
                                <div class="content-left">
                                    <h3 class="portfolio-card-title">
                                        <a href="{{ route('projects.show', $project->slug) }}" wire:navigate>{{ $project->title }}</a>
                                    </h3>
                                    <div class="tag-items">
                                        <ul>
                                            @php
                                            // Assuming tags are stored as a comma-separated string
                                            $tags = explode(',', $project->tags);
                                            @endphp
                                            @foreach($tags as $tag)
                                            <li>
                                                <a href="#" class="tag-item">{{ trim($tag) }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md" href="{{ route('projects.show', $project->slug) }}" wire:navigate>
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">View design</span>
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
                            <i class="fa-solid fa-folder-open display-4 text-muted mb-3"></i>
                            <h4 class="text-muted">No projects available at the moment.</h4>
                            <p>Please check back later for our latest work.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{-- Scroll Load More Trigger --}}
                @if($projects->hasMorePages())
                <div
                    x-data="{
                            observe() {
                                let observer = new IntersectionObserver((entries) => {
                                    entries.forEach(entry => {
                                        if (entry.isIntersecting) {
                                            @this.call('loadMore')
                                        }
                                    })
                                }, {
                                    rootMargin: '100px',
                                })
                                observer.observe(this.$el)
                            }
                        }"
                    x-init="observe"
                    class="text-center mt-5">
                    <button wire:click="loadMore" class="tmp-btn btn-primary radius-round">
                        <span wire:loading.remove>Load More Projects</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>