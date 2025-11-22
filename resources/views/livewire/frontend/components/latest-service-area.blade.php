<section class="latest-service-area {{ $pageName == 'home'? 'tmp-section-gapTop' : 'tmp-section-gap' }}">
    @if($pageName === 'home')
    <!-- Tpm Latest Service Area Start -->
    <div class="container">
        <div class="section-head mb--60">
            <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                <span class="subtitle">Latest Service</span>
            </div>
            <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Inspiring The World One Project</h2>
            <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3"> Business consulting consultants provide expert advice and guida
                businesses to help them improve their performance, efficiency, and organizational </p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <h2 class="service-card-num"><span>01.</span>A Portfolio of Creativity</h2>
                    <p class="service-para">Business consulting consultants provide expert advice and guida the a
                        businesses to help theme their performance efficiency</p>
                </div>
                <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <h2 class="service-card-num"><span>02.</span>My Portfolio of Innovation</h2>
                    <p class="service-para">My work is driven by the belief that thoughtful design and strategic planning can empower brands, transform businesses</p>
                </div>
                <div class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <h2 class="service-card-num"><span>03.</span>A Showcase of My Projects</h2>
                    <p class="service-para">In this portfolio, you’ll find a curated selection of projects that highlight my skills in [Main Areas, e.g., responsive web design</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-card-user-image">
                    <img class="tmp-scroll-trigger tmp-zoom-in animation-order-1" src="{{ url('assets/frontend/images/services/latest-services-user-image-two.png') }}" alt="latest-user-image">
                </div>
            </div>
        </div>
    </div>
    <!-- Tpm Latest Service Area End -->
    @elseif($pageName === 'service')
    <!-- Latest Service Area Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <h2 class="service-card-num"><span>01.</span>Success Architects</h2>
                    <p class="service-para">Business consulting consultants provide expert advice and guida the a
                        businesses to help theme their performance efficiency</p>
                </a>
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <h2 class="service-card-num"><span>02.</span>Success Architects</h2>
                    <p class="service-para">App consulting consultants provide expert advice and guida the a
                        businesses to help theme their performance efficiency</p>
                </a>
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <h2 class="service-card-num"><span>03.</span>Success Architects</h2>
                    <p class="service-para">I specialize in creating solutions that are not only visually engaging but
                        also align with business goals. From [list services, e.g., branding,</p>
                </a>
            </div>
            <div class="col-lg-6 col-sm-6">
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-4">
                    <h2 class="service-card-num"><span>04.</span>Ui/visual Design</h2>
                    <p class="service-para">I’m proud of what I’ve accomplished and excited to share my journey with
                        you. I’m proud of what I’ve accomplished and excited to.</p>
                </a>
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-5">
                    <h2 class="service-card-num"><span>05.</span>Branding Design</h2>
                    <p class="service-para">Interested in working together? Let’s bring your ideas to life! Contact me,
                        and let’s start building something amazing.</p>
                </a>
                <a href="service-details.html"
                    class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-6">
                    <h2 class="service-card-num"><span>06.</span>Motion Design</h2>
                    <p class="service-para">Feel free to browse through my recent projects. Each one showcases my
                        approach and dedication to detail, creativity, and.</p>
                </a>
            </div>
        </div>
    </div>
    <!-- Latest Service Area End -->
    @endif
</section>