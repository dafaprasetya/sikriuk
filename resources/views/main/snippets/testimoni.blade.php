<!-- TESTIMONI SECTION -->
<section class="testimonial-section-2">
    <div class="container wow fadeInUp" data-wow-delay=".3s">
        <div class="testimonial-wrapper-2 bg-cover">
            <div class="section-title text-center">
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Apa kata mereka?
                </h2>
            </div>
            <div class="row align-items-center">

                <div class="col-xl-12 col-lg-12 mt-5 mt-lg-0">
                    <div class="swiper testimonial-content-slider-2">
                        <div class="swiper-wrapper">
                            <!-- START LOOPING TESTIMONI -->
                            @foreach ($testimoni as $testi)
                                
                            <div class="swiper-slide">
                                <div class="testimonial-content center">
                                    <div class="client-info">
                                        <img src="{{ asset('storage/testimoni_image/'.$testi->foto) }}" alt="" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin: 0 auto; display: block;">
                                        <h4>{{ $testi->nama }}</h4>
                                        <h5>{{ $testi->pekerjaan }}</h5>
                                    </div>
                                    <h3>
                                        “{{ $testi->kata }}”
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                            <!-- START LOOPING TESTIMONI -->
                            
                        </div>
                        <div class="swiper-dot style-2">
                            <div class="dot-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
