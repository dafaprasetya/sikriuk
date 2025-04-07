@extends('main.snippets.core')

@section('content')
@php
    $navbars = [
        'main.snippets.navbar',
        'main.snippets.navbar2',
        'main.snippets.navbar3'
    ];
    $randomNavbar = $navbars[array_rand($navbars)];
@endphp

@include($randomNavbar)
@include('main.snippets.loadingscreen')

<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('storage/blog/thumbnail/'. $blog->thumbnail) }}');">
    <div class="container">
        <div class="page-heading center">
            <h1>{{ $blog->title }}</h1>
        </div>
    </div>
</div>

<!--<< Blog Wrapper Here >>-->
<section class="blog-wrapper news-wrapper section-padding section-bg">
    <div class="container">
        <div class="news-area">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details border-wrap mt-0">
                        <div class="single-blog-post post-details mt-0">
                            <div class="post-content pt-0">
                                <h2 class="mt-0">{{ $blog->title }}</h2>
                                <div class="post-meta mt-3">
                                    <span><i class="fal fa-user"></i>{{ $blog->user->name }}</span>
                                    <span><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d-F-Y') }}</span>
                                </div>
                                <img src="{{ asset('storage/blog/gambar/'.$blog->gambar) }}" alt="blog__img" class="single-post-image">
                                {!! $blog->content !!}
                            </div>
                        </div>
                        <div class="row tag-share-wrap">
                            <div class="col-lg-8 col-12">
                                <h4>Share Blog</h4>
                                <div class="social-share">
                                    @php
                                        $shareUrl = urlencode(route('blogDetail', $blog->slug));
                                        $blogTitle = urlencode($blog->title);
                                    @endphp

                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $blogTitle }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>

                                    <a href="https://www.linkedin.com/shareArticle?url={{ $shareUrl }}&title={{ $blogTitle }}" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>

                                    <a href="https://api.whatsapp.com/send?text={{ $blogTitle }}%20{{ $shareUrl }}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>

                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


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
                                    <input type="text" placeholder="Search your keyword...">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h4>Blog Terbaru</h4>
                            </div>
                            <div class="popular-posts">
                                @foreach ($listblog as $blogs)
                                <div class="single-post-item">
                                    <div class="thumb bg-cover" style="background-image: url('{{ asset('storage/blog/thumbnail/'.$blogs->thumbnail) }}');"></div>
                                    <div class="post-content">
                                        <h5><a href="news-details.html">{{ $blogs->title }}</a></h5>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d-F-Y') }}
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
