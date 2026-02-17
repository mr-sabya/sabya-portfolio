<!-- Tpm Our Supported Company Area Start -->
<div class="our-supported-company-area tmp-section-gap">
    <div class="container">
        <div class="row justify-content-center">

            @forelse($partners as $partner)
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="support-company-logo tmp-scroll-trigger tmp-fade-in animation-order-{{ $loop->iteration }}">
                    @if($partner->link)
                    <a href="{{ $partner->link }}" target="_blank">
                        @endif

                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">

                        @if($partner->link)
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <!-- Empty State Design -->
            <div class="col-12 text-center py-5">
                <div class="p-5 border rounded bg-light">
                    <i class="fa-solid fa-handshake display-4 text-muted mb-3"></i>
                    <h4 class="text-muted">No supported companies available at the moment.</h4>
                    <p>We are currently updating our partner list. Please check back later.</p>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</div>
<!-- Tpm Our Supported Company Area End -->