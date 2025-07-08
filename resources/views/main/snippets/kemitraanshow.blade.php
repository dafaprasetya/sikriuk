<!-- KEMTIRAAN GEROBAK SHOW SECTION -->
<section class="section-padding" >
    <div class="container">
        <div class="about-wrapper style-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-12">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="wow fadeInUp">Kemitraan</span>
                            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                                Mari bergabung bersama kami
                            </h2>
                            <h3 class="wow fadeInUp mt-2 merah" data-wow-delay=".5s">keunggulan mitra</h3>
                        </div>
                        <div class="container">
                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                <ul class="popinsfont" style="list-style-type: disc;">
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

            </div>
        </div>
    </div>
</section>
