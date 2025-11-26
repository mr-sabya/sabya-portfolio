@extends('frontend.layouts.app')

@section('content')
<!-- tmp banner area start -->
<livewire:frontend.home.banner />
<!-- tmp banner area end -->

<!-- service area -->
<livewire:frontend.components.service-area />
<!-- service area -->

<!-- counter area -->
<livewire:frontend.components.counter-area />
<!-- counter area -->

<!-- latest service area -->
<livewire:frontend.components.latest-service-area pageName="home" />
<!-- latest service area -->

<!-- skill area -->
<livewire:frontend.components.skill-area className="tmp-section-gapTop" />
<!-- skill area -->

<!-- education experience area -->
<livewire:frontend.components.education-experience-area />
<!-- education experience area -->

<!-- company area -->
<livewire:frontend.components.company-area />
<!-- company area -->


<div class="tpm-custom-box-bg">
    <!-- Tpm Latest Portfolio Area Start -->
    <div class="latest-portfolio-area custom-column-grid">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">Latest Portfolio</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Transforming Ideas into Exceptional </h2>
                <p class="description section-sm tmp-scroll-trigger tmp-fade-in animation-order-3">Business consulting consultants provide expert advice and guida
                    businesses to help them improve their performance, efficiency, and organizational</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-1.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-1.jpg') }}" alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">My Journey as a Creator</a>
                                </h3>
                                <p class="portfoli-card-para">Development Coaches</p>
                            </div>
                            <a href="project-details.html" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="latest-portfolio-card mt--100 mt_sm--0 mt_md--50 tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-2.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-2.jpg') }}" alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">My Professional Portfolio
                                </h3>
                                <p class="portfoli-card-para"> Development Coaches</p>
                            </div>
                            <a href="project-details.html" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-portfolio-card tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-3.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-3.jpg') }}" alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">My Portfolio of Innovation</a>
                                </h3>
                                <p class="portfoli-card-para">App Development</p>
                            </div>
                            <a href="project-details.html" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-portfolio-card mt--100 mt_sm--0 mt_md--50 tmp-hover-link tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <div class="portfoli-card-img">
                            <div class="img-box v2">
                                <a href="project-details.html">
                                    <img class="img-primary hidden-on-mobile" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-4.jpg') }}" alt="Blog Thumbnail">
                                    <img class="img-secondary" src="{{ url('assets/frontend/images/latest-portfolio/portfoli-img-4.jpg') }}" alt="BLog Thumbnail">
                                </a>
                            </div>
                        </div>
                        <div class="portfolio-card-content-wrap">
                            <div class="content-left">
                                <h3 class="portfolio-card-title"><a class="link" href="project-details.html">A Portfolio of Creativity and Passion</a>
                                </h3>
                                <p class="portfoli-card-para">Business Development</p>
                            </div>
                            <a href="project-details.html" class="tmp-arrow-icon-btn">
                                <div class="btn-inner">
                                    <i class="tmp-icon fa-solid fa-arrow-up-right"></i>
                                    <i class="tmp-icon-bottom fa-solid fa-arrow-up-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tpm Latest Portfolio Area End -->


    <!-- Tpm My Skill Area Start -->
    <section class="my-skill tmp-section-gapTop">
        <div class="container">
            <div class="section-head text-align-left mb--60">
                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">My Skill</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevated Designs Personalized <br> the best Experiences</h2>
            </div>
            <div class="services-widget v1">
                <div class="service-item current tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-building-columns"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Ui/visual Design</h3>
                            <p class="sub-title">21 Done</p>
                        </div>
                        <p class="card-para">My work is driven by the belief that thoughtful design and strategic planning can empower brands strategic planning can empower brands</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-calendar"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Ui/visual Design</h3>
                            <p class="sub-title">21 Done</p>
                        </div>
                        <p class="card-para">In this portfolio, you’ll find a curated selection of projects that highlight my skills in [Main Areas, e.g., responsive web design</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="service-item tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="my-skill-card">
                        <div class="card-icon">
                            <i class="fa-light fa-pen-nib"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="main-title">Motion Design</h3>
                            <p class="sub-title">20 Done</p>
                        </div>
                        <p class="card-para">Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs</p>
                        <a href="#" class="read-more-btn">Read More <span class="read-more-icon"><i
                                    class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                    <button class="service-link modal-popup"></button>
                </div>
                <div class="active-bg wow fadeInUp mleave"></div>
            </div>
        </div>
    </section>
    <!-- Tpm My Skill Area End -->
</div>


<!-- pricing plan -->
<livewire:frontend.components.pricing-plan className="tmp-section-gapTop" />
<!-- pricing plan -->

<!-- testimonial area -->
<livewire:frontend.components.testimonial-area />
<!-- testimonial area -->

<!-- blog area -->
<livewire:frontend.components.blog-area />
<!-- blog area -->

@endsection