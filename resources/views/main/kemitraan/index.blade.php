@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@if ($promo->count() >= 1)
@include('main.snippets.navbar')
@include('main.snippets.promo')
@else
@include('main.snippets.navbar2')
@endif
<!-- Modal -->
@if(session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <div class="mx-auto my-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM6.97 10.97a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 9.44 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
          </svg>
        </div>
        <h5 class="text-success">Terimakasih Sudah Mendaftar, Tim kami akan menindak lanjuti proses pendaftaran anda</h5>
        <div class="mt-3">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var myModal = new bootstrap.Modal(document.getElementById('successModal'));
      myModal.show();
    });
</script>
@endif
@if($errors->any())
<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <div class="mx-auto my-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#dc3545" class="bi bi-x-octagon" viewBox="0 0 16 16">
                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </div>
        <h5 class="text-danger">Harap lengkapi data yang sesuai dan centang "Saya bukan robot"</h5>
        <div class="mt-3">
            <button id="btnCloseError" type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();

        document.getElementById('btnCloseError').addEventListener('click', function () {
            setTimeout(function () {
                const section = document.getElementById('joinmitra');
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                }
            }, 500);
        });
    });
</script>
@endif

<!-- KEMTIRAAN GEROBAK SHOW SECTION -->
<section class="about-section fix section-padding pt-0">
    <div class="container">
        <div class="about-wrapper style-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="wow fadeInUp">Kemitraan</span>
                            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                                Mari bergabung bersama kami
                            </h2>
                            <h3 class="wow fadeInUp mt-2 merah lalitfont" data-wow-delay=".5s">keunggulan mitra</h3>
                        </div>
                        <div class="container">
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                <ul style="list-style-type: disc;">
                                    @foreach ($keunggulan as $keunggulans)
                                    <li class="wow fadeInUp popinsfont" data-wow-delay=".5s"><b>{{ $keunggulans->nama }}</b>:{{ $keunggulans->deskripsi }}</li>

                                    @endforeach
                                </ul>
                            </p>
                        </div>

                        <div class="info-area d-flex align-items-center">
                            <a href="{{ route('kemitraan') }}" class="theme-btn wow style-line-height fadeInUp" data-wow-delay=".3s">Selengkapnya tentang kemitraan</a>

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
                    <h2 class="mb-2 lalitfont">{{ $gerobaks->nama }}</h2>
                    <p class="mb-1 popinsfont">Harga mulai dari Rp. {{ number_format($gerobaks->harga, 0, ',', '.') }}</p>
                    <h3 class="popinsfont">Benefit</h3>
                    <ul class="benefitgerobak">
                    @foreach ($gerobaks->benefit as $benefit)
                        <li class="mt-2 popinsfont"><strong>{{ $benefit->benefit }}</strong></li>
                    @endforeach
                    </ul>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-lg-6 mt-2">
                                <a class="btn btn-success w-100" href="https://wa.me/{{ $about->phone->first()->phone }}?text={{ urlencode('Saya tertarik dengan ' . $gerobaks->nama . ' dan ingin mendapatkan info lebih lanjut. *Sumber info: website sikriuk.com*') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                      </svg>
                                    Tanya Di WhatsApp
                                </a>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <a class="btn btn-danger w-100" href="#joinmitra">
                                    Gabung Sekarang
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
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">Frequently ask question</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="faq-content">
                    <div class="faq-accordion wow fadeInUp" data-wow-delay=".3s">
                        <div class="accordion" id="accordion" >
                            @foreach ($faq as $faqs)

                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed popinsfont" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faqs->id }}" aria-expanded="false" aria-controls="faq{{ $faqs->id }}">
                                    {{ $faqs->tanya }}
                                    </button>
                                </h4>
                                <div id="faq{{ $faqs->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body popinsfont">
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
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">Syarat Menjadi Mitra Sikriuk</h2>
        </div>
        <div class="swiper-wrapper">
            <!-- START LOOPING LANGKAH LANGKAH MENJADI MITRA -->
            @foreach ($syarat as $syarats)

            <div class="swiper-slide wow fadeInUp" data-wow-delay=".3s">
                <div class="text-center">
                    <h3 class="merah">{{ $syarats->nama }}</h3>
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
