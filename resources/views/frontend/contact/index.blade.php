@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb -->
<livewire:frontend.components.breadcrumb
    pageTitle="Contact"
    pageSubTitle="Contact with me" />
<!-- breadcrumb -->

<div class="contact-area-wrapper tmp-section-gap">
    <div class="container">
        <div class="contact-info-wrap">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-1">
                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h3 class="title">Address</h3>
                        <p class="para">Dhaka 102, utl 1216, road 45</p>
                        <p class="para">house of street</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-2">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h3 class="title">E-mail</h3>
                        <a href="mailto:themespark11@gmail.com">
                            <p class="para">hasan@yourmail.com</p>
                        </a>
                        <a href="mailto:themespark11@gmail.com">
                            <p class="para">themespark11@gmail.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-3">
                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h3 class="title">Call Me</h3>
                        <p class="para">0000 - 000 - 000 00</p>
                        <p class="para">+1234 - 000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- get in touch -->
    <livewire:frontend.components.get-in-touch className="tmp-section-gap" />
    <!-- get in touch -->

</div>

@endsection