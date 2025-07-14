<section id="lokasi" class="section-padding wow fadeInUp" data-wow-delay=".7s" >
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay=".7s">
            <span class="wow fadeInUp lalitfont">Lokasi</span>
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                Mau ngerasain sikriuk?, yuk cek sikriuk disekitarmu
            </h2>
        </div>
        <div class=" wow fadeInUp" data-wow-delay=".7s">
            <img class="img-fluid src="{{ asset('img/Home (LOKASI)_.png') }}" alt="" srcset="">
        </div>
        <div class="row mt-3 text-center">
            <div class="col-sm-12">
                <a href="{{ route('lokasimain') }}" class="theme-btn btn-sm wow style-line-height fadeInUp w-80" data-wow-delay=".5s">Lihat lokasi mitra {{ $about->nama }}</a>
            </div>
        </div>
    </div>
</section>
