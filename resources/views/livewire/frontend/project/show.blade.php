<div class="project-details-area-wrapper tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="project-details-thumnail-wrap">
                    {{-- Use the new Main Project Image, fallback to thumbnail if empty --}}
                    <img src="{{ asset('storage/' . ($project->project_image ?? $project->thumbnail)) }}" 
                         alt="{{ $project->title }}" class="w-100 rounded shadow-sm">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="project-details-content-wrap">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="title mb-0">{{ $project->title }}</h2>
                        {{-- New Website Link Button --}}
                        @if($project->website_link)
                            <a href="{{ $project->website_link }}" target="_blank" class="tmp-btn btn-primary btn-md radius-round">
                                Visit Website <i class="fa-solid fa-external-link ms-2"></i>
                            </a>
                        @endif
                    </div>

                    <div class="docs-content">
                        {!! $project->description_one !!}
                    </div>

                    @if($project->technologies->count() > 0)
                    <div class="check-box-wrap mt-5">
                        <ul>
                            @foreach($project->technologies as $tech)
                            <li>
                                <h4 class="check-box-item">
                                    <span><i class="fa-solid fa-circle-check"></i></span>
                                    {{ $tech->name }}
                                </h4>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($project->mini_title)
                    <h2 class="mini-title mt--50">{{ $project->mini_title }}</h2>
                    <div class="docs">
                        {!! $project->description_two !!}
                    </div>
                    @endif

                    @if($project->gallery->count() > 0)
                    <div class="project-details-swiper-wrapper mt--50">
                        <div class="swiper project-details-swiper">
                            <div class="swiper-wrapper">
                                @foreach($project->gallery as $image)
                                <div class="swiper-slide">
                                    <div class="project-details-img">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image" class="rounded">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="project-details-swiper-btn">
                            <div class="project-swiper-button-prev"><span><i class="fa-solid fa-arrow-left"></i></span>Previous</div>
                            <div class="project-swiper-button-next">Next <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="signle-side-bar project-details-area tmponhover">
                    <div class="header">
                        <h3 class="title">Project Information</h3>
                    </div>
                    <div class="body">
                        @if($project->client)
                        <div class="project-details-info">Client: <span>{{ $project->client->name }}</span></div>
                        @endif
                        
                        <div class="project-details-info">Author: <span>{{ $project->author_name }}</span></div>
                        

                        {{-- Date Logic --}}
                        <div class="project-details-info">Status: <span class="text-capitalize">{{ str_replace('-', ' ', $project->progress) }}</span></div>
                        
                        @if($project->start_date)
                        <div class="project-details-info">Started: <span>{{ $project->start_date->format('d M, Y') }}</span></div>
                        @endif

                        @if($project->end_date)
                        <div class="project-details-info">Completed: <span>{{ $project->end_date->format('d M, Y') }}</span></div>
                        @elseif($project->client_deadline)
                        <div class="project-details-info">Deadline: <span class="text-danger">{{ $project->client_deadline->format('d M, Y') }}</span></div>
                        @endif

                        <div class="project-details-info">Tags: <span>{{ $project->tags }}</span></div>
                    </div>
                </div>

                {{-- Sidebar Call to Action --}}
                @if($project->website_link)
                <div class="mt-4">
                    <a href="{{ $project->website_link }}" target="_blank" class="tmp-btn btn-border w-100 text-center radius-round">
                        Live Preview <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>