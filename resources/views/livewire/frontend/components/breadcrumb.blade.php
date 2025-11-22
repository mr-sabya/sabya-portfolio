<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">{{ $pageTitle }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item">
                            <a href="{{ route('home')}}" wire:navigate>Home</a>
                        </li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $pageSubTitle }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->