@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar2')
<!-- ASECTION MENU -->
<section class="about-food-section">
    <div class="container">
        <div class="about-food-wrapper bg-cover" style="background-image: url('foodking/assets/img/shape/about-food-bg.png');">
            <div class="section-title text-center">
                <span class="wow fadeInUp">menu</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Menu {{ $about->nama }}
                </h2>
            </div>

            @if ($katmenu->count() >= 2)
            <ul class="nav justify-content-center">
                @foreach ($katmenu as $kategori)
                <li class="nav-item wow fadeInUp" data-wow-delay=".3s">
                    <a href="#{{ $kategori->nama }}" data-bs-toggle="tab" class="nav-link">
                        {{ $kategori->nama }}
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($katmenu as $kategori)
                <div id="{{ $kategori->nama }}" class="tab-pane fade show @if($loop->first) active @endif">

                    <div class="description-items">
                        <div class="row">
                            <!-- START LOOPING MENU CAT 1 -->
                            @foreach ($kategori->product as $menu)
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="about-food-items center">
                                    <div class="food-image">
                                        <img style="width: 188px; height: 181px;" src="{{ asset('storage/product_image/'.$menu->gambar) }}" alt="food-img">
                                    </div>
                                    <div class="food-content">
                                        <h3><a href="#">{{ $menu->nama }}</a></h3>
                                        <h4><a href="#">{{ $menu->deskripsi }}</a></h4>
                                        <p>
                                            Rp. {{ number_format($menu->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- END LOOPING MENU -->

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="tab-content">
                <div id="makanan" class="tab-pane fade show active">
                    <div class="description-items">
                        <div class="row">
                            <!-- START LOOPING MENU CAT 1 -->
                            @foreach ($menu as $menus)

                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="about-food-items center">
                                    <div class="food-image">
                                        <img style="width: 188px; height: 181px;" src="{{ asset('storage/product_image/'.$menus->gambar) }}" alt="food-img">
                                    </div>
                                    <div class="food-content">
                                        <h3><a href="#">{{ $menus->nama }}</a></h3>
                                        <h4><a href="#">{{ $menu->deskripsi }}</a></h4>
                                        <p>
                                            Rp. {{ number_format($menus->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- END LOOPING MENU -->
                        </div>
                    </div>
                </div>

            </div>
            @endif
            <hr>
            <div class="text-center produkonline wow style-line-height fadeInUp w-100" data-wow-delay=".5s">
                <h4 class="text-muted" style="margin-bottom: 50px">produk kami bisa ditemukan di</h4>
                <div class="row mt-2 gambaronline">
                    <div class="col-md-3">
                        <img src="{{ asset('img/grabfood.png') }}" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('img/maxim.png') }}" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('img/gofood.png') }}" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('img/shopee-food.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Banner Section Start -->
<div class="video-section section-padding bg-cover">

</div>

@include('main.snippets.jargon')
@include('main.lokasi.lokasi')
@include('main.snippets.footer')
@endsection
