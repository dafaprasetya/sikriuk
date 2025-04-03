<!-- SECTION PROMO -->
<section class="hero-section">
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <!-- START PROMOOO -->
            @foreach ($promo as $promos)
            <div class="swiper-slide">
                <div class="hero-2 bg-cover" style="background-image: url('{{ asset('foodking/assets/img/hero/hero-bg-2.jpg') }}');">
                    <div class="left-shape" data-animation="fadeInUp" data-delay="2.2s">
                        <img src="foodking/assets/img/hero/left-shape.png" alt="shape-img">
                    </div>
                    <div class="chili-shape" data-animation="fadeInUp" data-delay="2.4s">
                        <img src="foodking/assets/img/hero/left-shape.png" alt="shape-img">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <img class="img-thumbnail" src="{{ asset('storage/promo_image/'.$promos->gambar) }}" alt="shape-img">
                            </div>
                            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                <div class="hero-content">
                                    <h1  data-animation="fadeInUp" data-delay="1.5s">
                                        {{ $promos->nama }}
                                    </h1>
                                    <div data-animation="fadeInUp" data-delay="1.7s" class="price-text">
                                        <h3>{{ $promos->deskripsi }}</h3>
                                    </div>
                                    <div class="hero-button">
                                        <a href="#joinmitra" class="theme-btn" data-animation="fadeInUp" data-delay="1.9s">
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
