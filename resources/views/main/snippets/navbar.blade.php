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
    <div id="header-sticky" class="header-1">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="index.html" class="header-logo">
                        <img src="{{ asset('img/logo/Logo_IKI.png') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="header-left">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="active">
                                            <a href="{{ route('home') }}">
                                            Home
                                        </li>
                                        <li>
                                            <a href="{{ route('home') }}">
                                            Profile
                                        </li>
                                        <li>
                                            <a href="{{ route('home') }}">
                                            Kemitraan
                                        </li>
                                        <li>
                                            <a>Support</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- for wp -->
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</header>
