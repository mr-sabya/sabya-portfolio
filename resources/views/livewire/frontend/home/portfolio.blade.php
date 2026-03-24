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
                <div class="col-lg-6">
                    <livewire:frontend.component.portfolio-card
                        :id="$project->id"
                        :index="$loop->iteration"
                        :key="'project-'.$project->id" />
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