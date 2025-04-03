<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo/Logo_IKI-besar.png') }}" alt="logo">
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
<header>
    <div class="header-top">

    </div>
    <div id="header-sticky" class="{{ Route::is('home') ? 'header-4' : 'header-1 style-6' }}">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    @if (Route::is('home'))
                    <div class="logo-left">

                        <a href="index.html" class="logo-1">
                        <img src="{{ asset('img/logo/Logo_IKI.png') }}" alt="logo-img">
                        </a>
                        <a href="index.html" class="logo-2">
                        <img src="{{ asset('img/logo/Logo_IKI.png') }}" alt="logo-img">
                        </a>
                    </div>
                    @else
                    <div class="logo">
                        <a href="index.html" class="header-logo">
                        <img src="{{ asset('img/logo/Logo_IKI.png') }}" alt="logo-img">
                        </a>
                    </div>
                    @endif

                    <div class="{{ Route::is('home') ? 'header-left' : 'header-right d-flex justify-content-end align-items-center' }}">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="active">
                                            <a href="{{ route('home') }}" style="{{ Route::is('home') ? 'color:#FFB936;' : '' }}">
                                            Home
                                        </li>
                                        <li>
                                            <a href="{{ route('profile') }}" style="{{ Route::is('profile') ? 'color:#FFB936;' : '' }}">
                                            Profil
                                        </li>
                                        <li>
                                            <a href="{{ route('menumain') }}" style="{{ Route::is('menumain') ? 'color:#FFB936;' : '' }}">
                                            Menu
                                        </li>
                                        <li>
                                            <a href="{{ route('kemitraan') }}" style="{{ Route::is('kemitraan') ? 'color:#FFB936;' : '' }}">
                                            Kemitraan
                                        </li>
                                        <li>
                                            <a href="{{ route('blogmain') }}" style="{{ Route::is('blogmain') || Route::is('blogDetail') ? 'color:#FFB936;' : '' }}">Blog</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- for wp -->
                            </div>
                        </div>
                    </div>
                    @if (Route::is('home'))

                    <div class="header-right d-flex justify-content-end align-items-center">

                        <div class="header-button">
                            <a href="#joinmitra" class="theme-btn bg-red-2">Gabung Mitra Sekarang</a>
                        </div>
                        <div class="header__hamburger d-xl-block my-auto">
                            <div class="sidebar__toggle">
                                <div class="header-bar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
