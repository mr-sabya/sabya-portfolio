@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="Blog"
    pageSubTitle="Blog" />
<!-- breadcrumb -->

<!-- Blog Classic Area Start -->
<div class="blog-classic-area-wrapper tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-1.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Inspiring the World, One
                                Project at a
                                Time for the
                                man</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-2.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Let’s bring your ideas to life! Contact me, and let’s</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-3.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Each one showcases my approach and dedication man</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-2.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Let’s bring your ideas to life! Contact me, and let’s</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-1.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Inspiring the World, One
                                Project at a
                                Time for the
                                man</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-card tmp-hover-link image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-3">
                    <div class="img-box">
                        <a href="blog-details.html">
                            <img class="w-100" src="{{ url('assets/frontend/images/blog/blog-img-3.jpg') }}" alt="Blog Thumbnail">
                        </a>
                        <ul class="blog-tags">
                            <li><span class="tag-icon"><i class="fa-regular fa-user"></i></span>Mesbah</li>
                            <li><span class="tag-icon"><i class="fa-solid fa-calendar-days"></i></span>April 10</li>
                        </ul>
                    </div>
                    <div class="blog-content-wrap">
                        <h3 class="blog-title"><a class="link" href="blog-details.html">Each one showcases my approach and dedication man</a></h3>
                        <div class="more-btn tmp-link-animation">
                            <a href="blog-details.html" class="read-more-btn">Read More <span class="read-more-icon"><i
                                        class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Classic Area End -->

@endsection