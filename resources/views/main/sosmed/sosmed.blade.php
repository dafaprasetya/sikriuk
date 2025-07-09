<section id="lokasi" class="section-padding" data-wow-delay=".3s" >
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp lalitfont">SOSIAL MEDIA</span>
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                Follow Sosmed Sikriuk Untuk Mendapatkan Informasi Terbaru!
            </h2>
        </div>
        <div class="section-title text-center mt-2 mb-2">
            @foreach ($about->sosmed as $sosmed)
                <a href="{{ $sosmed->links }}"><i class="{{ $sosmed->logo }}"></i></a>
            @endforeach
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('img/Home (SOSMED).png') }}" alt="" srcset="">
        </div>
    </div>
</section>
