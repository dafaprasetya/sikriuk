<!-- BLOG -->
<section class="news-section fix section-padding">
    <div class="burger-shape">
        <img src="foodking/assets/img/shape/burger-shape-3.png" alt="burger-shape">
    </div>
    <div class="fry-shape">
        <img src="foodking/assets/img/shape/fry-shape-2.png" alt="burger-shape">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">BLOG SIKRIUK</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">berita update sikriuk</h2>
        </div>
        <div class="row">
            <!-- START LOOPING BLOG -->
            @foreach ($blog as $blogs)

            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="single-news-items">
                    <div class="news-image bg-cover" style="background-image: url('{{ asset('storage/blog/thumbnail/'.$blogs->thumbnail) }}');">
                    </div>
                    <div class="news-content">
                        <ul class="post-date d-flex align-items-center">
                            <li>{{ \Carbon\Carbon::parse($blogs->created_at)->translatedFormat('d-F-Y') }}</li>
                            <li>{{ $blogs->user->name }}</li>
                        </ul>
                        <h3>
                            <a href="{{ route('blogDetail',$blogs->slug) }}">
                            {{ $blogs->title }}
                            </a>
                        </h3>
                        <p>

                        </p>

                        <a href="{{ route('blogDetail',$blogs->slug) }}" class="theme-btn style-box-shadow mt-4">baca selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- END LOOPING BLOG -->
        </div>
    </div>
</section>
