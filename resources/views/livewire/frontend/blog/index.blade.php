<div class="blog-classic-area-wrapper tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    <div class="img-box">
                        <a href="{{ route('blog.show', $post->slug) }}" wire:navigate>
                            <img class="w-100" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                        </a>
                        <ul class="blog-tags">
                            <li>
                                <span class="tag-icon"><i class="fa-regular fa-user"></i></span>
                                {{ $post->author->name ?? 'Admin' }}
                            </li>
                            <li>
                                <span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>
                                {{ $post->created_at->format('M d, Y') }}
                            </li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title">
                            <a class="link" href="{{ route('blog.show', $post->slug) }}" wire:navigate>
                                {{ Str::limit($post->title, 60) }}
                            </a>
                        </h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="{{ route('blog.show', $post->slug) }}" class="read-more-btn">
                                Read More
                                <span class="read-more-icon"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 border rounded bg-light">
                    <i class="fa-solid fa-newspaper display-4 text-muted mb-3"></i>
                    <h4 class="text-muted">No blog posts found.</h4>
                    <p>We haven't published any articles yet. Stay tuned!</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Load More Button --}}
        @if($posts->hasMorePages())
        <div class="row mt--50">
            <div class="col-12 text-center">
                <button wire:click="loadMore" class="tmp-btn btn-primary radius-round">
                    <span wire:loading.remove wire:target="loadMore">Load More Posts</span>
                    <span wire:loading wire:target="loadMore">Loading...</span>
                </button>
            </div>
        </div>
        @endif
    </div>
</div>