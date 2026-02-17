<div class="blog-classic-area-wrapper tmp-section-gap">
    <div class="container">
        <div class="row">
            <!-- Main Content Area -->
            <div class="col-lg-8">
                <div class="blog-details-left-area">
                    {{-- Featured Thumbnail --}}
                    <div class="thumbnail-top mb--30">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-100 rounded shadow-sm">
                    </div>

                    <div class="blog-details-discription">
                        {{-- Meta Info --}}
                        <div class="blog-classic-tag">
                            <h4 class="title">By {{ $post->author->name ?? 'Admin' }}</h4>
                            <ul>
                                <li>
                                    <div class="tag-wrap">
                                        <i class="fa-solid fa-tag"></i>
                                        <h4 class="tag-title">{{ $post->category->name }}</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="tag-wrap">
                                        <i class="fa-solid fa-calendar-day"></i>
                                        <h4 class="tag-title">{{ $post->created_at->format('M d, Y') }}</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        {{-- Main Post Title --}}
                        <h2 class="title split-collab mb--30">{{ $post->title }}</h2>

                        {{-- DYNAMIC CONTENT BLOCKS LOOP --}}
                        <div class="post-dynamic-content">
                            @foreach($post->contents as $block)
                            <div class="content-block mb--30">

                                {{-- Render Text Block --}}
                                @if($block->type === 'text')
                                <div class="tutorial-content dark-theme-content mb--40">
                                    {!! $block->data['body'] !!}
                                </div>

                                {{-- Render Image Block --}}
                                @elseif($block->type === 'image')
                                <div class="blog-inner-image text-center mt--40 mb--40">
                                    <img src="{{ asset('storage/' . $block->data['url']) }}" alt="Content Image" class="rounded w-100 shadow-sm">
                                    @if(!empty($block->data['caption']))
                                    <p class="small text-muted mt-2"><em>{{ $block->data['caption'] }}</em></p>
                                    @endif
                                </div>

                                {{-- Render Code Block with Copy Button (Alpine.js) --}}
                                @elseif($block->type === 'code')
                                @php $blockId = 'code-' . $loop->index; @endphp
                                <div class="code-block-wrapper mt--40 mb--40 shadow-lg" style="background: #0d1117; border-radius: 10px; border: 1px solid #30363d; overflow: hidden;">

                                    {{-- Header Bar --}}
                                    <div class="d-flex justify-content-between align-items-center px-4 py-3" style="background: #161b22; border-bottom: 1px solid #30363d;">
                                        <div>
                                            {{-- Language Label: Highly Visible Cyan --}}
                                            <span style="color: #58a6ff; font-weight: 800; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; font-family: sans-serif;">
                                                <i class="fa-solid fa-terminal me-2"></i>{{ $block->data['lang'] ?? 'Code' }}
                                            </span>
                                        </div>
                                        <div>
                                            {{-- Copy Button: High Visibility --}}
                                            <button
                                                type="button"
                                                {{-- Livewire 3: Dispatches a browser event directly --}}
                                                wire:click.prevent="$dispatch('copy-to-clipboard', { 
                    text: '{{ addslashes($block->data['code']) }}', 
                    id: 'btn-{{ $blockId }}' 
                })"
                                                id="btn-{{ $blockId }}"
                                                class="btn btn-sm d-flex align-items-center gap-2 px-3 py-1"
                                                style="background: #21262d; color: #c9d1d9; border: 1px solid #f0f6fc; border-radius: 6px; font-weight: 600; transition: all 0.2s;">
                                                <i class="fa-regular fa-copy"></i>
                                                <span>Copy</span>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Code Area --}}
                                    <div class="p-4 overflow-auto">
                                        <pre class="m-0" style="background: transparent; border: none;"><code class="text-white" style="font-family: 'Fira Code', 'JetBrains Mono', monospace; font-size: 15px; line-height: 1.7; display: block; white-space: pre-wrap; color: #e6edf3 !important;">{{ $block->data['code'] }}</code></pre>
                                    </div>
                                </div>
                                @endif

                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Keywords Section --}}
                    @if($post->seo && $post->seo->meta_keywords)
                    <div class="blog-details-navigation mt--50">
                        <div class="navigation-tags">
                            <h3 class="tag-title">Keywords:</h3>
                            <ul>
                                @foreach(explode(',', $post->seo->meta_keywords) as $keyword)
                                <li>
                                    <p class="tag"><a href="#">{{ trim($keyword) }}</a></p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="social-link footer">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                    @endif

                    {{-- Post Navigation (Prev/Next) --}}
                    <div class="our-portfolio-swiper mt--50">
                        <div class="our-portfolio-swiper-btn-wrap">
                            @if($prevPost)
                            <a href="{{ route('blog.show', $prevPost->slug) }}" class="prev-btn">
                                <div class="tmp-arrow-btn">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>
                                <div class="btn-content text-start">
                                    <span class="para">Previous post</span>
                                    <h4 class="title">{{ Str::limit($prevPost->title, 25) }}</h4>
                                </div>
                            </a>
                            @endif

                            @if($nextPost)
                            <a href="{{ route('blog.show', $nextPost->slug) }}" class="next-btn">
                                <div class="btn-content text-end">
                                    <span class="para">Next post</span>
                                    <h4 class="title">{{ Str::limit($nextPost->title, 25) }}</h4>
                                </div>
                                <div class="tmp-arrow-btn">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-lg-4">
                <div class="tmp-sidebar">
                    {{-- Search Widget --}}
                    <div class="signle-side-bar search-area tmponhover">
                        <div class="body">
                            <form class="search-area">
                                <input type="text" placeholder="Search posts..." required>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>

                    {{-- Categories Widget --}}
                    <div class="signle-side-bar recent-post-area tmponhover">
                        <div class="header">
                            <h3 class="title">Categories</h3>
                        </div>
                        <div class="body">
                            @foreach($categories as $cat)
                            <a href="#" class="single-post">
                                <span class="single-post-left">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="post-title">{{ $cat->name }}</span>
                                </span>
                                <span class="post-num">({{ str_pad($cat->posts_count, 2, '0', STR_PAD_LEFT) }})</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent Posts Widget --}}
                    <div class="signle-side-bar recent-post-area tmponhover">
                        <div class="header">
                            <h3 class="title">Recent Posts</h3>
                        </div>
                        <div class="body">
                            @foreach($recentPosts as $recent)
                            <div class="single-post-card tmp-hover-link">
                                <div class="single-post-card-img">
                                    <img src="{{ asset('storage/' . $recent->thumbnail) }}" alt="recent" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="single-post-right">
                                    <div class="single-post-top">
                                        <i class="fa-regular fa-folder-open"></i>
                                        <p class="post-title">{{ $recent->category->name }}</p>
                                    </div>
                                    <h3 class="post-title">
                                        <a class="link" href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 40) }}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Author Widget --}}
                    <div class="signle-side-bar tmponhover">
                        <div class="header">
                            <h3 class="title">About Author</h3>
                        </div>
                        <div class="body">
                            <div class="about-me-details">
                                <div class="about-me-details-head">
                                    <div class="about-me-img">
                                        <img src="{{ url('assets/frontend/images/blog/about-me-user-img.png') }}" alt="author">
                                    </div>
                                    <div class="about-me-right-content">
                                        <h3 class="title">{{ $post->author->name ?? 'Admin' }}</h3>
                                        <p class="para">Content Creator</p>
                                    </div>
                                </div>
                                <p class="about-me-para">Exploring the intersection of technology and creativity through detailed articles and guides.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('copy-to-clipboard', (event) => {
            // event[0] is used because Livewire 3 wraps event details in an array
            const data = event[0];

            navigator.clipboard.writeText(data.text).then(() => {
                const btn = document.getElementById(data.id);
                const originalContent = btn.innerHTML;

                // Visual Feedback
                btn.innerHTML = '<i class="fa-solid fa-check text-success"></i> <span class="text-success">Copied!</span>';
                btn.style.borderColor = '#238636';
                btn.style.background = '#2ea44f22';

                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.style.borderColor = '#f0f6fc';
                    btn.style.background = '#21262d';
                }, 2000);
            }).catch(err => {
                console.error('Copy failed', err);
            });
        });
    });
</script>