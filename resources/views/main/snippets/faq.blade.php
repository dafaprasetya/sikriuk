<section class="section-padding" id="faq">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay=".3s">
            <span class="wow fadeInUp lalitfont">FAQ</span>
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                Pertanyaan Umum Tentang Kemitraan Sikriuk
            </h2>
        </div>
        <div class="row popinsfont">
            @foreach ($faq as $faqs)

            <div class="col-md-3 mt-2">
                <button class="theme-btn-2 w-100 wow fadeInUp" data-wow-delay=".5s" type="button" data-bs-toggle="collapse" data-bs-target="#dropdownContent{{ $faqs->id }}">
                    {{ $faqs->tanya }}
                </button>

                <div class="collapse mt-2" id="dropdownContent{{ $faqs->id }}">
                    <div class="card card-body">
                        <p>{{ $faqs->jawab }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
