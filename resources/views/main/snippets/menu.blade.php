<section class="grilled-banner fix section-padding bg-cover">
    <div class="offer-shape float-bob-y">
    </div>
    <div class="wow fadeInUp spicy-shape" data-wow-delay="1s">
        <h3 class="merah lalitfont text-center">Hanya di<br>Si Kriuk Krispy!</h3>
        {{-- <img src="assets/img/shape/spicy.png" alt="shape-img"> --}}
    </div>
    <div class="tomato-shape">
        <img src="{{ asset("foodking/assets/img/shape/tomato-shape-2.png") }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="grilled-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0 wow fadeInUp" data-wow-delay="1s">
                    <div class="grilled-image">
                        <img src="{{ asset('img/Home (MENU)_.png') }}" alt="grilled-img">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="grilled-content">
                        <span class="wow fadeInUp lalitfont merah">MENU</span>
                        <h2 class="wow fadeInUp lalitfont" data-wow-delay="1s">
                            MENU <span style="color: #dc000f">{{ $about->nama }}</span>
                        </h2>
                        <h3 class="wow fadeInUp" data-wow-delay="1s">
                            <a href="{{ route('menumain') }}">
                            Rasakan Kenikmatan Makanan Kami
                            </a>
                        </h3>
                        <div class="grilled-button wow fadeInUp" data-wow-delay="1s">
                            <a href="{{ route('menumain') }}" class="theme-btn">
                                <span class="button-content-wrapper d-flex align-items-center">
                                    <span class="button-text popinsfont">Lihat Menu</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
