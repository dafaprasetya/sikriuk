<!-- LANGKAH LANGKAH MENJADI MITRA -->
<section class="gallery">

    <div class="gallery-section fix section-padding wow fadeInUp" data-wow-delay=".3s">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">step by step</span>
                <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">Step By Step Menjadi Mitra Sikriuk</h2>
            </div>
            <div class="array-button">
                <button class="array-prev"><i class="far fa-long-arrow-left"></i></button>
                <button class="array-next"><i class="far fa-long-arrow-right"></i></button>
            </div>
            <div class="swiper gallery-slider">
                <div class="swiper-wrapper">
                    <!-- START LOOPING LANGKAH LANGKAH MENJADI MITRA -->
                    @foreach ($langkah as $langkahs)

                    <div class="swiper-slide">
                        <div class="gallery-imag">
                            <img src="{{ asset('storage/step_image/'.$langkahs->gambar) }}" style="width: 300px;" alt="gallery-img">

                        </div>
                    </div>
                    @endforeach
                    <!-- END LOOPING LANGKAH LANGKAH MENJADI MITRA -->

                </div>
            </div>
        </div>
    </div>
</section>
