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
                <div class="col-xl-3 col-sm-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
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
                <div class="col-xl-4 ps-lg-5 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Link website</h4>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="about.html">
                                <span class="text-effect">
                                <span class="effect-1">Profil</span>
                                <span class="effect-1">Profil</span>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                <span class="text-effect">
                                <span class="effect-1">Kemitraan</span>
                                <span class="effect-1">Kemitraan</span>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="news-details.html">
                                <span class="text-effect">
                                <span class="effect-1">Support</span>
                                <span class="effect-1">Support</span>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-xl-4 col-sm-6 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Alamat:</h4>
                        </div>
                        <div class="footer-address-text">
                            <h6>
                                {{ $about->lokasi }}
                            </h6>
                            <h5>Jam buka:</h5>
                            <h6>
                                9.30am – 6.30pm <br>
                                Monday to Friday
                            </h6>
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
