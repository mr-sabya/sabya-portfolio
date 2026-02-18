<!-- Tpm Blog and news Area Start -->
<section class="blog-and-news-are tmp-section-gap">
    <div class="container">
        <div class="section-head mb--50">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">Blog and news</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevating Personal Branding <br> through Powerful Portfolios</h2>
        </div>
        <div class="row g-5">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    <div class="img-box">
                        {{-- Route assumes you have a named route: blog.details --}}
                        <a href="{{ route('blog.show', $post->slug) }}" wire:navigate>
                            @if($post->thumbnail)
                            <img class="img-primary hidden-on-mobile" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                            <img class="img-secondary" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                            @else
                            <img class="img-primary" src="{{ url('assets/frontend/images/blog/blog-img-4.jpg') }}" alt="Placeholder">
                            @endif
                        </a>
                        <ul class="blog-tags">
                            <li>
                                <span class="tag-icon"><i class="fa-regular fa-user"></i></span>
                                {{ $post->user->name ?? 'Admin' }}
                            </li>
                            <li>
                                <span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>
                                {{ $post->created_at->format('M d') }}
                            </li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title v2">
                            <a class="link" href="{{ route('blog.show', $post->slug) }}" wire:navigate>
                                {{ Str::limit($post->title, 60) }}
                            </a>
                        </h3>
                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more-btn v2" wire:navigate>
                            Read More
                            <span class="read-more-icon"><i class="fa-solid fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No blog posts found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Tpm Blog and news Area End -->