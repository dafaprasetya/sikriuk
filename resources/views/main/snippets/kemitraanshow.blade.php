<!-- KEMTIRAAN GEROBAK SHOW SECTION -->
<section class="about-section fix section-padding pt-0">
    <div class="container">
        <div class="about-wrapper style-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="wow fadeInUp">Kemitraan</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                Mari bergabung bersama kami
                            </h2>
                            <h3 class="wow fadeInUp md-8" data-wow-delay=".5s">keunggulan mitra</h3>
                        </div>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            <ul style="list-style-type: disc;">
                                @foreach ($keunggulan as $keunggulans)
                                <li class="wow fadeInUp" data-wow-delay=".5s"><b>{{ $keunggulans->nama }}</b>:{{ $keunggulans->deskripsi }}</li>

                                @endforeach
                            </ul>
                        </p>

                        <div class="info-area d-flex align-items-center">
                            <a href="about.html" class="theme-btn wow style-line-height fadeInUp" data-wow-delay=".3s">Selengkapnya tentang kemitraan</a>

                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 mt-5 mt-lg-0">
                    <div class="about-image-2">
                        <div class="swiper gallery-slider">
                            <div class="swiper-wrapper">
                                <!-- START LOOPING GAMBAR GEROBAK -->
                                @foreach ($kemitraan as $kemitraans)
                                <div class="swiper-slide">
                                    <div class="gallery-image">
                                        <img src="{{ asset('storage/gerobak_image/'.$kemitraans->gambar) }}" alt="gallery-img">
                                    </div>
                                </div>
                                @endforeach
                                <!-- END LOOPING GAMBAR GEROBAK -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
