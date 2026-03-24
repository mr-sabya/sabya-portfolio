<div>
    <div class="latest-portfolio-card-style-two image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-{{ $index }}">
        <div class="portfoli-card-img">
            <div class="img-box v2">
                <a class="tmp-scroll-trigger tmp-zoom-in" href="{{ route('projects.show', $project->slug) }}" wire:navigate>
                    @if($project->thumbnail)
                    <img class="w-100" src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                    @else
                    <img class="w-100" src="{{ asset('assets/images/placeholder.jpg') }}" alt="Placeholder">
                    @endif
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
                        // Handle tags whether they are a string or an array
                        $tags = is_array($project->tags) ? $project->tags : explode(',', $project->tags);
                        @endphp
                        @foreach($tags as $tag)
                        @if(!empty(trim($tag)))
                        <li>
                            <a href="#" class="tag-item">{{ trim($tag) }}</a>
                        </li>
                        @endif
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