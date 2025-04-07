<!-- Footer Section Start -->
<footer class="footer-section fix">
    <div class="burger-shape">
        <img src="{{ asset('foodking/assets/img/shape/burger-shape-3.png') }}" alt="burger-shape">
    </div>
    <div class="fry-shape">
        <img src="{{ asset('foodking/assets/img/shape/fry-shape-2.png') }}" alt="burger-shape">
    </div>
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row">
                <div class="col-md-3 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="index.html">
                            <img src="{{ asset('img/logo/Logo_IKI.png') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                {{ $about->moto }}
                            </p>
                            @foreach ($about->email as $email)

                            <a href="{{ $email->email }}" class="link">{{ $email->email }}</a>
                            @endforeach
                            <br>
                            @foreach ($about->phone as $phone)

                            <a href="{{ $phone->phone }}" class="link">{{ $phone->phone }}</a>
                            @endforeach
                            <div class="social-icon d-flex align-items-center">
                                @foreach ($about->sosmed as $sosmed)

                                <a href="{{ $sosmed->links }}"><i class="{{ $sosmed->logo }}"></i></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Link website</h4>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="{{ route('profile') }}">
                                <span class="text-effect">
                                <span class="effect-1">Profil</span>
                                <span class="effect-1">Profil</span>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kemitraan') }}">
                                <span class="text-effect">
                                <span class="effect-1">Kemitraan</span>
                                <span class="effect-1">Kemitraan</span>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blogmain') }}">
                                <span class="text-effect">
                                <span class="effect-1">Blog</span>
                                <span class="effect-1">Blog</span>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="news-details.html">
                                <span class="text-effect">
                                <span class="effect-1">Lokasi Mitra</span>
                                <span class="effect-1">Lokasi Mitra</span>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Alamat:</h4>
                        </div>
                        <div class="footer-address-text">
                            <h6>
                                {{ $about->lokasi }}
                            </h6>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Jam Operasional Kemitraan:</h4>
                        </div>
                        <div class="footer-address-text">
                            <table style="width: 100%; background-color: red; border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: yellow; color: black;">
                                        <th style="padding: 10px; border: 1px solid yellow;">Hari</th>
                                        <th style="padding: 10px; border: 1px solid yellow;">Jam Buka</th>
                                    </tr>
                                </thead>
                                @if ($about->jambuka->isNotEmpty())
                                <tbody>
                                    @foreach ($about->jambuka as $jam)
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid yellow; color: white;">{{ $jam->hari }}</td>
                                        <td style="padding: 10px; border: 1px solid yellow; color: white;">{{ $jam->jam_buka }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid yellow; color: white;">Setiap Hari</td>
                                        <td style="padding: 10px; border: 1px solid yellow; color: white;">08:00 - 22:00</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>

<!-- Back To Top Start -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
