<section id="lokasi" class="section-padding" data-wow-delay=".3s" >
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">Lokasi</span>
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                Mau ngerasain sikriuk?, yuk cek sikriuk disekitarmu
            </h2>
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('img/Home (LOKASI)_.png') }}" alt="" srcset="">
        </div>
        <div class="row mt-3 text-center">
            <div class="col-sm-12">
                <a href="{{ route('lokasimain') }}" class="theme-btn btn-sm wow style-line-height fadeInUp w-80" data-wow-delay=".5s">Lihat lokasi mitra {{ $about->nama }}</a>
            </div>
        </div>
    </div>
</section>
