<!-- Section Tentang Perusahaan -->
<section class="about-section section-padding pt-0 mt-3">
    <div class="leaves-shape">
        <img src="foodking/assets/img/shape/leaves.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="about-wrapper-2">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="pizza-image">
                        <img class="img-fluid" src="{{ asset('storage/banner_image/'.$about->banner) }}" alt="pizza-img">
                        <div class="quate-content">
                            <h3>
                                {{ $about->moto }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 mt-5 mt-lg-0">
                    <div class="about-content wow fadeInUp" data-wow-delay=".3s">
                        <div class="section-title">
                            <span class="wow fadeInUp" data-wow-delay=".3s">Tentang Kami</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                {{ $about->nama }} <br>
                                <small>{{ $about->namapt }}</small>
                            </h2>
                        </div>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            {{ $about->deskripsi }}
                        </p>
                        <div class="about-counter-area d-flex align-items-center justify-content-start">
                            <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                                <h3>M</h3>
                                <h5>Total Mitra</h5>
                                <h2><span class="count">{{ $about->total_mitra }}</h2>
                            </div>
                            <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                                <h3>F</h3>
                                <h5>Total Followers Instagram</h5>
                                <h2><span class="count">{{ $about->followersig }}</h2>
                            </div>
                        </div>
                        <div class="about-info">

                            <a href="{{ route('profile') }}" class="theme-btn-2 wow fadeInUp" data-wow-delay=".5s">Lihat profil perusahaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END SECTION TENTANG PERUSAHAAN -->
