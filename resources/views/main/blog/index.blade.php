@extends('main.snippets.core')

@section('content')
@include('main.snippets.navbar2')
@include('main.snippets.loadingscreen')

<!--<< Blog Wrapper Here >>-->
<section class="blog-wrapper news-wrapper section-padding section-bg">
    <div class="container">
        <div class="news-area">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts">
                        @foreach ($blog as $blogs)
                        <div class="single-blog-post">
                            <div class="post-featured-thumb bg-cover" style="background-image: url('{{ asset('storage/blog/thumbnail/'. $blogs->thumbnail) }}');"></div>
                            <div class="post-content">
                                <div class="post-meta">
                                    <span><i class="fal fa-user"></i>{{ $blogs->user->name }}</span>
                                    <span><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blogs->created_at)->translatedFormat('d-F-Y') }}</span>
                                </div>
                                <h2><a href="{{ route('blogDetail', $blogs->slug) }}">{{ $blogs->title }}</a></h2>
                                <p>
                                    {!! \Illuminate\Support\Str::substr($blogs->content, 0, 200) !!}
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div class="post-link">
                                        <a href="{{ route('blogDetail', $blogs->slug) }}"><i class="fas fa-arrow-right"></i>Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="page-nav-wrap mt-5 text-center">
                        <ul>
                            <li><a class="page-numbers" {{ $blog->onFirstPage() ? 'style=display:none' : 'style=display:block' }} href="{{ $blog->onFirstPage() ? '#' : $blog->previousPageUrl() }}"><i class="fal fa-long-arrow-left"></i></a></li>
                            <li><a class="page-numbers" {{ $blog->hasMorePages() ? 'style=display:block' : 'style=display:none' }} href="{{ $blog->hasMorePages() ? $blog->nextPageUrl() : '#' }}"><i class="fal fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search_widget">
                                <form action="#">
                                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search your keyword...">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Promo Sikriuk</h4>
                            </div>
                            <div class="popular-posts">
                                @foreach ($promo as $promos)
                                <div class="single-post-item">
                                    <div class="thumb bg-cover" style="background-image: url('{{ asset('storage/promo_image/'.$promos->gambar) }}');"></div>
                                    <div class="post-content">
                                        <h5><a href="{{ route('kemitraan') }}">{{ $promos->nama }}</a></h5>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($promos->created_at)->translatedFormat('d-F-Y') }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Never Miss News</h4>
                            </div>
                            <div class="social-link">
                                @foreach ($about->sosmed as $sosmed)

                                <a href="{{ $sosmed->links }}"><i class="{{ $sosmed->logo }}"></i></a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('main.snippets.jargon')
@include('main.snippets.footer')
@endsection
