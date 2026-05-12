<!-- start footer -->
<footer class="footer-dark bg-dark-gray pt-0 pb-2 lg-pb-35px">
    <div
        class="footer-top pt-50px pb-50px sm-pt-35px sm-pb-35px border-bottom border-1 border-color-transparent-white-light">
        <div class="container">
            <div class="row ">
                <!-- start footer column -->
                <div class="col-12 col-xl-6 text-xl-start lg-mb-30px sm-mb-20px">
                    <h6 class="text-white mb-5px fw-500 ls-minus-1px">Get in touch with us.</h><br>
                        <span class="fs-20 widget-text fw-300">We will take care of your requirments and
                            queries.</span>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-xl-6 text-center text-xl-end ">
                    <div class="row justify-content-around align-items-center">
                        <a href="{{ route('site.contact') }}"
                            class="col btn btn-extra-large btn-yellow left-icon btn-box-shadow btn-rounded text-transform-none d-inline-block align-middle me-15px xs-m-5px xs-px-0"><i
                                class="feather icon-feather-mail"></i>Need support?</a>
                        <a href="tel:{{ site_settings('phone') }}"
                            class="col btn btn-extra-large btn-base-color left-icon btn-box-shadow btn-rounded d-inline-block align-middle xs-m-5px xs-px-0"><i
                                class="feather icon-feather-phone-call"></i>{{ site_settings('phone') }}</a>
                    </div>

                </div>
                <!-- end footer column -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  fs-17 fw-300 col-sm-12 mt-5 mb-4 md-mt-45px md-mb-45px xs-mt-35px xs-mb-35px">
            <!-- start footer column -->
            <div class="col-12 col-lg order-sm-1 md-mb-40px xs-mb-30px last-paragraph-no-margin">
                <a href="#" class="footer-logo mb-15px d-inline-block"><img
                        src="{{ site_settings('logo') }}"
                        data-at2x="{{ site_settings('logo') }}" alt=""></a>

            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-12 xs-mb-30px order-sm-3 order-lg-2">
                <span class="fs-18 fw-400 d-block text-white mb-5px">About</span>
                <ul>
                    <li><a href="{{ route('site.product') }}">Our Product</a></li>
                    <li><a href="{{ route('site.export') }}">Export</a></li>
                    <li><a href="{{ route('site.catalogue') }}">Catalogue</a></li>
                    <li><a href="{{ route('site.product_information') }}">Information</a></li>
                    <li><a href="{{ route('site.contact') }}">Contect</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                <span class="fs-18 fw-400 d-block text-white mb-5px">Our Collection</span>
                <ul>
                    @foreach ($main_categories as $m_cat)
                        <li><a href="{{ route('site.category', $m_cat->slug) }}">{{ $m_cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-4 xs-mb-30px order-sm-5 order-lg-4 me-5 last-paragraph-no-margin">
                <span class="fs-18 fw-400 d-block text-white mb-5px">Get in touch</span>
                <a href="{{ route('site.contact') }}">{{ site_settings('address')}}</a>

            </div>
            <!-- end footer column -->
            <!-- <div class="col-6 col-lg col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                <span class="fs-18 fw-400 d-block text-white mb-5px">Need support?</span>
                <ul>
                    <li><a href="mailto:export@ibon.in" class="text-white  mb-10px d-block mb-15px">export@ibon.in</a></li>
                </ul>
            </div> -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-6 md-mb-40px xs-mb-0 order-sm-5 order-lg-5">
                <span class="fs-18 fw-400 d-block text-white mb-0">Need support?</span>
                <a href="mailto:{{ site_settings('receive_email') }}">{{ site_settings('receive_email') }}</a>

                <span class="mt-10px fs-18 fw-400 d-block text-white mb-0">Customer care?</span>
                <a href="tel:{{ site_settings('phone') }}">{{ site_settings('phone') }}</a>

                <span class="mt-10px fs-18 fw-400 d-block text-white mb-0">Follow us on</span>
                <div class="elements-social social-icon-style-02">
                    <ul class="small-icon light">
                        @if (site_settings('facebook_link') != null)
                            <li><a class="facebook" href="{{ site_settings('facebook_link') }}" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i><span></span></a></li>
                        @endif
                        @if (site_settings('instagram_link') != null)
                            <li><a class="instagram" href="{{ site_settings('instagram_link') }}" target="_blank"><i
                                        class="fa-brands fa-instagram"></i><span></span></a></li>
                        @endif
                        @if (site_settings('twitter_link') != null)
                            <li><a class="twitter" href="{{ site_settings('twitter_link') }}" target="_blank"><i
                                        class="fa-brands fa-twitter"></i><span></span></a></li>
                        @endif
                        @if (site_settings('linkedin_link') != null)
                            <li><a class="linkedin" href="{{ site_settings('linkedin_link') }}" target="_blank"><i
                                        class="fa-brands fa-linkedin"></i><span></span></a></li>
                        @endif
                        @if (site_settings('youtube_link') != null)
                            <li><a class="youtube" href="{{ site_settings('youtube_link') }}" target="_blank"><i
                                        class="fa-brands fa-youtube"></i><span></span></a></li>
                        @endif
                        @if (site_settings('pinterest_link') != null)
                            <li><a class="pinterest" href="{{ site_settings('pinterest_link') }}" target="_blank"><i
                                        class="fa-brands fa-pinterest"></i><span></span></a></li>
                        @endif
                        @if (site_settings('googleplus_link') != null)
                            <li><a class="google" href="{{ site_settings('googleplus_link') }}" target="_blank"><i
                                        class="fa-brands fa-google"></i><span></span></a></li>
                        @endif
                    </ul>
                </div>

{{-- 
                <p class="mb-5px ">Need support?</p>
                <a href="mailto:hi@domain.com" class="text-white lh-16 mb-10px d-block mb-15px ">export@ibon.in</a>
                <p class="mb-5px ">Customer care?</p>
                <a href="tel:12345678910" class="text-white lh-16 mb-10px d-block mb-15px ">+91 78200 28000</a>
                <p class="mb-5px ">Web</p>
                <a href="#" class="text-white lh-16 mb-10px d-block mb-15px ">www.ibon.in</a>
                <p class="mb-5px ">Follow us on</p>
                <div class="elements-social social-icon-style-02 mt-10px">
                    <ul class="small-icon light">
                        <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i
                                    class="fa-brands fa-dribbble"></i></a></li>
                        <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                    class="fa-brands fa-twitter"></i></a></li>
                        <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div> --}}
            </div>
            <!-- end footer column -->
        </div>
        <div class="row align-items-center fs-16 fw-300">
            <!-- start copyright -->
            <div class="col-md-4 last-paragraph-no-margin order-2 order-md-1 text-center text-md-start">
                <p>&COPY; Copyright 2024 <a href="index.html" target="_blank"
                        class="text-decoration-line-bottom text-white">IBON</a></p>
            </div>
            <!-- end copyright -->
            <!-- start footer menu -->
            <div class="col-md-8 text-md-end order-1 order-md-2 text-center text-md-end sm-mb-10px">
                <ul class="footer-navbar sm-lh-normal">
                    <li><a href="#" class="nav-link">Privacy policy</a></li>
                    <li><a href="#" class="nav-link">Terms and conditions</a></li>
                </ul>
            </div>
            <!-- end footer menu -->
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start sticky -->
<div class="sticky-wrap d-none d-lg-inline-block" data-animation-delay="100" data-shadow-animation="true">
    <span class="fs-16"><i class="bi bi-envelope icon-small me-10px"></i>Get our products — <a href="Contact.html"
            class="text-decoration-line-bottom fw-500">Send a message</a></span>
</div>
<!-- end sticky -->
<!-- start scroll progress -->
<div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
        <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
</div>
<!-- end scroll progress -->
