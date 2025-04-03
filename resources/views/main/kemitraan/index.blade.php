@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar')
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
                            <h3 class="wow fadeInUp mt-2 merah" data-wow-delay=".5s">keunggulan mitra</h3>
                        </div>
                        <div class="container">
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                <ul style="list-style-type: disc;">
                                    @foreach ($keunggulan as $keunggulans)
                                    <li class="wow fadeInUp" data-wow-delay=".5s"><b>{{ $keunggulans->nama }}</b>:{{ $keunggulans->deskripsi }}</li>

                                    @endforeach
                                </ul>
                            </p>
                        </div>

                        <div class="info-area d-flex align-items-center">
                            <a href="{{ route('kemitraan') }}" class="theme-btn wow style-line-height fadeInUp" data-wow-delay=".3s">Selengkapnya tentang kemitraan</a>

                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 mt-5 mt-lg-0">
                    <div class="about-content">
                        <div class="swiper gallery-slider">
                            <div class="swiper-wrapper">
                                <!-- START LOOPING GAMBAR GEROBAK -->
                                <iframe src="{{ asset('storage/proposal/'.$proposal->file) }}" width="100%" height="600px"></iframe>

                                <!-- END LOOPING GAMBAR GEROBAK -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="mt-2">

        @foreach ($gerobak as $gerobaks)
        <div class="row align-items-center {{ $loop->iteration % 2 == 0 ? 'flex-row-reverse' : '' }} wow fadeInUp" data-wow-delay=".3s">

            <div class="col-sm-6">
                <div class="container text-center">

                    <img class="img-thumbnail gerobakimg" src="{{ asset('storage/gerobak_image/'.$gerobaks->gambar) }}" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <h2 class="mb-2">{{ $gerobaks->nama }}</h2>
                    <p class="mb-1">Harga mulai dari Rp. {{ number_format($gerobaks->harga, 0, ',', '.') }}</p>
                    <h3>Benefit</h3>
                    <ul class="benefitgerobak">
                    @foreach ($gerobaks->benefit as $benefit)
                        <li class="mt-2"><strong>{{ $benefit->benefit }}</strong></li>
                    @endforeach
                    </ul>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-success w-100" href="https://wa.me/{{ $about->phone->first()->phone }}?text={{ urlencode('Saya tertarik dengan ' . $gerobaks->nama . ' dan ingin mendapatkan info lebih lanjut. *Sumber info: website sikriuk.com*') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                      </svg>
                                    Saya Tertarik
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--<< Faq Section Start >>-->
<section class="faq-section fix section-padding">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">frequently ask question</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Frequently ask question</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="faq-content">
                    <div class="faq-accordion">
                        <div class="accordion" id="accordion">
                            @foreach ($faq as $faqs)

                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faqs->id }}" aria-expanded="false" aria-controls="faq{{ $faqs->id }}">
                                    {{ $faqs->tanya }}
                                    </button>
                                </h4>
                                <div id="faq{{ $faqs->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        {{ $faqs->jawab }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="mt-4">
    <div class="swiper gallery-slider">
        <div class="section-title text-center">
            <span class="wow fadeInUp">persyaratan</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Syarat Menjadi Mitra Sikriuk</h2>
        </div>
        <div class="swiper-wrapper">
            <!-- START LOOPING LANGKAH LANGKAH MENJADI MITRA -->
            @foreach ($syarat as $syarats)

            <div class="swiper-slide wow fadeInUp" data-wow-delay=".3s">>
                <div class="text-center">
                    <h3>{{ $syarats->nama }}</h3>
                    <p>{{ $syarats->deskripsi }}</p>
                </div>
            </div>
            @endforeach
            <!-- END LOOPING LANGKAH LANGKAH MENJADI MITRA -->

        </div>
    </div>
</div>
<div class="mt-4">
    @include('main.snippets.stepbystep')
    @include('main.snippets.formmitra')
</div>
@include('main.snippets.footer')
@endsection
