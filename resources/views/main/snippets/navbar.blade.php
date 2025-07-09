
<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo/LOGO SKK.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-lg-block">
                    {{ $about->deskripsi }}
                </p>

                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Info Kemitraan</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="#">{{ $about->lokasi }}</a>
                            </div>
                        </li>
                        @if ($about->email->count() >= 1)
                        @foreach ($about->email as $email)
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="#"><span class="mailto:{{ $email->email }}">{{ $email->email }}</span></a>
                                </div>
                            </li>
                        @endforeach
                        @endif
                        @if ($about->phone->count() >= 1)
                        @foreach ($about->phone as $phone)
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a>
                                </div>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <div class="header-button mt-4">
                        <a href="#joinmitra" class="theme-btn bg-red-2">Gabung Mitra Sekarang</a>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        @foreach ($about->sosmed as $sosmeds)
                            <a href="{{ $sosmeds->links }}"><i class="{{ $sosmeds->logo }}"></i></a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Area Start -->

<!-- Header Area Start -->
<header id="" class="header-2 style-6">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ route('home') }}" class="header-logo">
                        <img src="{{ asset('img/logo/logo-2.png') }}" alt="logo-img">
                    </a>
                </div>

                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{ route('home') }}" style="{{ Route::is('home') ? 'color:#fddd00;' : '' }}">
                                        Home
                                    </li>
                                    <li>
                                        <a href="{{ route('profile') }}" style="{{ Route::is('profile') ? 'color:#fddd00;' : '' }}">
                                        Profil
                                    </li>
                                    <li>
                                        <a href="{{ route('menumain') }}" style="{{ Route::is('menumain') ? 'color:#fddd00;' : '' }}">
                                        Menu
                                    </li>
                                    <li>
                                        <a href="{{ route('kemitraan') }}" style="{{ Route::is('kemitraan') ? 'color:#fddd00;' : '' }}">
                                        Kemitraan
                                    </li>
                                    <li>
                                        <a href="{{ route('blogmain') }}" style="{{ Route::is('blogmain') || Route::is('blogDetail') ? 'color:#fddd00;' : '' }}">Blog</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- for wp -->
                        </div>
                    </div>
                    <div class="header__hamburger d-lg-none">
                        <div class="sidebar__toggle">
                            <i class="far fa-bars" style="color: white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- SECTION PROMO -->
<section class="hero-section">
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <!-- START PROMOOO -->
            <div class="swiper-slide">
                <div class="hero-2 bg-cover" style="background-image: url('{{ asset('foodking/assets/img/hero/hero-bg-2.jpg') }}');">

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6" data-animation="fadeInUp" data-delay="1s">
                                <img class="img-fluid" src="{{ asset('img/Home (SAMPING SLOGAN).png') }}" alt="shape-img">
                            </div>
                            <div class="col-xl-6 d-flex justify-content-center align-items-center" data-animation="fadeInUp" data-delay="1s">
                                <div class="hero-content text-start">
                                    <h3 class="wow fadeInUp lalitfont" style="color: #fddd00" data-wow-delay="1s">{{ $about->namapt }}</h3>
                                    <h1 class="wow fadeInUp lalitfont" data-wow-delay="1s">{{ $about->nama }}</h1>
                                    <h2 class="wow fadeInUp lalitfont" style="color: #fddd00" data-wow-delay="1s">{{ $about->moto }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($promo as $promos)
            <div class="swiper-slide">
                <div class="hero-2 bg-cover" style="background-image: url('{{ asset('foodking/assets/img/hero/hero-bg-2.jpg') }}');">

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6" data-animation="fadeInUp" data-delay="1s">
                                <img class="img-thumbnail" src="{{ asset('storage/promo_image/'.$promos->gambar) }}" alt="shape-img">
                            </div>
                            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                <div class="hero-content">
                                    <h1 class="lalitfont" data-animation="fadeInUp" data-delay="1s">
                                        {{ $promos->nama }}
                                    </h1>
                                    <div class="lalitfont" data-animation="fadeInUp" data-delay="1s" class="price-text">
                                        <h3>{{ $promos->deskripsi }}</h3>
                                    </div>
                                    <div class="hero-button">
                                        <a href="#joinmitra" class="theme-btn" data-animation="fadeInUp" data-delay="1s">
                                        <span class="button-content-wrapper d-flex align-items-center">
                                        <span class="button-text">Gabung Mitra Sekarang</span>
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- END PROMOOO -->

        </div>

    </div>
    <div class="swiper-dot text-center pt-5">
        <div class="dot"></div>
    </div>

</section>

