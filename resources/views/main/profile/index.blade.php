@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar2')
<section id="profil" class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <div class="container-fluid">
                    <img class="img-thumbnail" src="{{ asset('storage/banner_image/'.$about->banner) }}" alt="pizza-img">
                </div>
            </div>
            <div class="col-xl-12 text-center mt-4">
                <div class="container-fluid">
                    <h2>Profil Perusahaan <span class="merah">{{ $about->nama }}</span></h2>
                    <h3>{{ $about->namapt }}</h3>
                </div>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="container text-center d-flex justify-content-center align-items-center">
                    <p>{{ $about->deskripsi }}</p>
                </div>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="container text-center d-flex justify-content-center align-items-center">
                    <p>{{ $about->deskripsi_lengkap }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mt-4 d-flex justify-content-center align-items-center">
                <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                    <h5>Total Mitra</h5>
                    <h2><span class="count merah">{{ $about->total_mitra }}</h2>
                </div>
            </div>
            <div class="col-sm-6 d-flex justify-content-center align-items-center">
                <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                    <h5>Total Mitra</h5>
                    <h2><span class="count merah">{{ $about->followersig }}</h2>
                </div>
            </div>
        </div>
        @include('main.snippets.jargon')
    </div>
    @if ($pencapaian->count() >= 1)

    <div class="container">
        <!--<< Gallery Section Start >>-->
        <div class="gallery-section fix section-bg section-padding">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-12 text-center mb-4">
                        <div class="container-fluid">
                            <h2>Tentang Pencapaian <span class="merah">{{ $about->nama }}</span></h2>
                        </div>
                    </div>
                    @foreach ($pencapaian as $pencapaians)

                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="galler-image-2 bg-cover" style="background-image: url('{{ asset('storage/pencapaian_image/'.$pencapaians->gambar) }}');">
                            <a href="{{ asset('storage/pencapaian_image/'.$pencapaians->gambar) }}" class="icon img-popup">
                                <i class="fal fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @include('main.snippets.jargon')

    </div>
    @endif

</section>
<section id="legalitas">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="container-fluid">
                    <h2>Legalitas Perusahaan <span class="merah">{{ $about->namapt }}</span></h2>
                    <h3>{{ $about->nama }}</h3>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="container-fluid">
                    <h4>{{ $about->legalitas }}</h4>
                </div>
            </div>
        </div>
        @include('main.snippets.jargon')
    </div>
</section>
@include('main.snippets.footer')
@endsection
