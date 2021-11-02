<footer class="footer-area">
    <!-- our-brand-area start -->
        <div class="our-brand-area ptb-100">
            @if (Request::segment(1) == '')
            <div class="container">
                <div class="row">
                    <div class="our-brand-active owl-carousel">
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/1.jpg') }}" alt=""></a>
                        </div>
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/2.jpg') }}" alt=""></a>
                        </div>
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/3.jpg') }}" alt=""></a>
                        </div>
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/4.jpg') }}" alt=""></a>
                        </div>
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/5.jpg') }}" alt=""></a>
                        </div>
                        <div class="brand-single-item">
                            <a href="#"><img src="{{ asset('template_client/img/brand/6.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    <!-- our-brand-area end -->
    <!-- newsletter-area start -->
    <div class="newsletter-area newletter-bg ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h4>our news</h4>
                        <h2>newsletter signup</h2>
                        <div class="module-description">
                            <p>Subscribe to our email list and stay up-to-date with all our anwesome releases and latest updates.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="newleter-content">
                        <form action="#" class="subscribe-box">
                            <input type="text" placeholder="Enter you email address here...">
                            <a href="#" class="subscribe-btn">Subscribe !</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter-area end -->
    <!-- footer-bottom start -->
    <div class="footer-bottom bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-copyright">
                        <p>Copyright &copy; 2018 <a href="#">T90 Themes</a> <span>All Right Reserved.</span></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="social-follow">
                        <ul class="social-link-follow">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom end -->
</footer>

