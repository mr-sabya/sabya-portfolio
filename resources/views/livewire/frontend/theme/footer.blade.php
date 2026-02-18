<footer class="footer-area footer-style-one-wrapper  tmp-section-gap">
    <div class="container">
        <div class="footer-main footer-style-one">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <div class="single-footer-wrapper border-right mr--20">
                        <livewire:frontend.theme.logo />
                        <p class="description"><span>Get Ready</span> To <br> Create Great</p>
                        <form action="#" class="newsletter-form-1 mt--40">
                            <input type="email" placeholder="Email Adress">
                            <span class="form-icon"><i class="fa-regular fa-envelope"></i></span>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-wrapper quick-link-wrap">
                        <h5 class="ft-title">Quick Link</h5>
                        <ul class="ft-link tmp-link-animation">
                            <li>
                                <a href="{{ route('about') }}" wire:navigate>About Me</a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}" wire:navigate>Service</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" wire:navigate>Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}" wire:navigate>Blog Post</a>
                            </li>
                            <li>
                                <a href="{{ route('pricing') }}" wire:navigate>Pricing</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-wrapper contact-wrap">
                        <h5 class="ft-title">Contact </h5>
                        <ul class="ft-link tmp-link-animation">
                            <li><span class="ft-icon"><i class="fa-solid fa-envelope"></i></span><a href="#">nafiz125@gmail.com</a></li>
                            <li><span class="ft-icon"><i class="fa-solid fa-location-dot"></i></span>3891
                                Ranchview Dr. Richardson</li>
                            <li><span class="ft-icon"><i class="fa-solid fa-phone"></i></span><a href="#">01245789321</a></li>
                        </ul>
                        <div class="social-link footer">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bg-img">
        <img src="{{ url('assets/frontend/images/footer/footer-bg-img.png') }}" alt="footer-img">
    </div>
</footer>