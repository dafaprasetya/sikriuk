<!-- KEMTIRAAN GEROBAK SHOW SECTION -->
{{-- <section class="section-padding">
    <div class="container">
        <div class="about-wrapper style-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6">
                    <div class="about-content">
                        <div class="section-title centeresponsip">
                            <span class="wow fadeInUp lalitfont centeresponsip">Kemitraan</span>
                            <h2 class="wow fadeInUp lalitfont centeresponsip" data-wow-delay=".3s">
                                Mari bergabung bersama kami
                            </h2>
                            <p class="wow fadeInUp popinsfont" data-wow-delay=".5s">
                                Sudah ada <strong>{{ $about->total_mitra }}</strong> yang sudah bergabung bersama kami,
                            </p>
                        </div>
                        <div class="info-area d-flex align-items-center text-center justify-content-center">
                            <a href="{{ route('kemitraan') }}" class="theme-btn wow style-line-height fadeInUp" data-wow-delay=".3s">Selengkapnya tentang kemitraan</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-content">
                        <div class="container">

                            <img class="img-fluid" src="{{ asset('img/STORE DEPAN 2.png') }}" alt="grilled-img">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
<section class="food-comboo-section fix bg-cover section-padding" style="background-image: url( {{ asset('foodking/assets/img/bg-image/bg.jpgs') }});">
    <div class="drinks-shape">
        <img src="{{ asset('foodking/assets/img/shape/drinkss.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="comboo-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="food-comboo-content">
                        <div class="section-title centeresponsip">
                            <span class="wow fadeInUp lalitfont">KEMITRAAN</span>
                            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".5s">
                                Bergabung bersama kami <span>dan</span> miliki resto sendiri
                            </h2>
                        </div>
                        <p class="wow fadeInUp" data-wow-delay=".7s">
                            Sudah ada <strong>{{ $about->total_mitra }}</strong> mitra yang sudah bergabung bersama kami
                        </p>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active wow fadeInUp ilangmobile" data-wow-delay=".5s" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                <span class="food-comboo-list">
                                    <span class="offer-image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" class="bi bi-shop" viewBox="0 0 16 16">
                                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                        </svg>
                                    </span>
                                    <span class="comboo-title popinsfont">
                                        Tampilan resto 1
                                    </span>
                                </span>
                            </button>
                            <button class="nav-link wow fadeInUp ilangmobile" data-wow-delay=".5s" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <span class="food-comboo-list">
                                    <span class="offer-image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" class="bi bi-shop" viewBox="0 0 16 16">
                                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                        </svg>
                                    </span>
                                    <span class="comboo-title popinsfont">
                                        Tampilan resto 2
                                    </span>
                                </span>
                            </button>
                            <div class="info-area d-flex align-items-center text-center justify-content-center">
                                <a href="{{ route('kemitraan') }}" class="theme-btn wow style-line-height fadeInUp popinsfont" data-wow-delay=".3s">Selengkapnya tentang kemitraan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="tab-content" id="nav-tab-Content wow fadeInUp" data-wow-delay=".5s">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="comboo-image bg-cover align-items-center" style="background-image: url('assets/img/banner/comboo-bg.jpg');">

                                <div class="pizza-image d-flex justify-content-center">
                                    <img class="img-fluid" src="{{ asset('img/STORE DEPAN 2.png') }}" alt="food-img">
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="comboo-image bg-cover" style="background-image: url('assets/img/banner/comboo-bg.jpg');">
                                <div class="pizza-image">
                                    <img class="img-fluid" src="{{ asset('img/STORE DEPAN.png') }}" alt="food-img">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
