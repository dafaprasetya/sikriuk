<!-- Section Tentang Perusahaan -->
<section class="section-padding">
    <div class="container">
        <div class="about-wrapper-2">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pizza-image">
                        <img class="wow fadeInUp img-fluid" data-wow-delay=".7s" src="{{ asset('storage/banner_image/'.$about->banner) }}" alt="pizza-img">
                        <div class="wow fadeInUp quate-content" data-wow-delay=".7s">
                            <h3 class="lalitfont">
                                {{ $about->moto }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 mt-5 mt-lg-0">
                    <div class="about-content wow fadeInUp" data-wow-delay=".7s">
                        <div class="section-title text-center mb-4 wow fadeInUp" data-wow-delay=".7s">
                            <span class="wow fadeInUp lalitfont" data-wow-delay=".7s">Tentang Kami</span>
                            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".7s">
                                {{ $about->nama }} <br>
                                <small>{{ $about->namapt }}</small>
                            </h2>
                        </div>
                        <p class="wow fadeInUp popinsfont" data-wow-delay=".7s">
                            {{ $about->deskripsi }}
                        </p>
                        <div class="about-counter-area d-flex align-items-center justify-content-start">
                            <div class="counter-items wow fadeInUp popinsfont" data-wow-delay=".7s">
                                <h3>M</h3>
                                <h5>Total Mitra</h5>
                                <h2><span class="count">{{ $about->total_mitra }}</h2>
                            </div>
                            <div class="counter-items wow fadeInUp popinsfont" data-wow-delay=".7s">
                                <h3>F</h3>
                                <h5>Total Followers Instagram</h5>
                                <h2><span class="count">{{ $about->followersig }}</h2>
                            </div>
                        </div>
                        <div class="about-info">

                            <a href="{{ route('profile') }}" class="theme-btn-2 wow fadeInUp" data-wow-delay=".7s">Lihat profil perusahaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END SECTION TENTANG PERUSAHAAN -->
