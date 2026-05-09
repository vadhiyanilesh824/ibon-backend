@extends('fontend.layouts.app')
@section('title', 'We Garnish The Architect')
@section('content')
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor"
        style="background-image: url({{ $data['image'] }})">
        <div class="container">
            <div class="row extra-very-small-screen pt-10 md-pt-20">
                <div class="col-12 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px xs-mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>{{ $data['subtitle'] }}
                    </h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">{{ $data['title'] }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <section class="py-0 p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="row justify-content-center mb-3">
                        <div class="col-lg-6 col-md-7 col-sm-8 text-center"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <h4 class="fw-700 text-dark-gray ls-minus-2px">{{ $data['title'] }}</h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($main_parentcategory as $mpc)
                            <div class="col-md-4 mb-30px ">
                                <div class="position-relative overflow-hidden"
                                    data-anime='{ "effect": "slide", "color": "#005153", "direction":"lr", "easing": "easeOutQuad", "delay":50}'>
                                    <a href="{{route('site.category',$mpc->slug)}}">
                                        <img src="{{ $mpc->banner_url }}" alt=""
                                            class="w-100 border-radius-6px" style="aspect-ratio:3/2;object-fit:cover">
                                        <div class="bg-very-light-gray position-absolute pt-15px pb-15px ps-15px pe-15px border-radius-4px bottom-20px right-20px left-20px box-shadow-large d-flex align-items-center"
                                            data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 800, "staggervalue": 500, "easing": "easeOutQuad" }'>
                                            <span class="text-dark-gray ls-1px d-inline-block lh-22">{{$mpc->name}}</span>
                                        </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3"></div>
        </div>
    </section>

    <section class="half-section p-0 border-bottom">
        <div class="container p-0">
            <div class="row justify-content-center mb-30px"
                data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-lg-5 text-center mb-15px">
                    <span
                        class="text-dark-gray fw-600 fs-16 ls-minus-05px text-uppercase border-1 pb-5px border-bottom border-color-extra-medium-gray text-dark-gray">
                        Applications</span>
                </div>
            </div>
            <div class="row position-relative clients-style-08 mb-5 mt-5 sm-mb-40px"
                data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col swiper text-center feather-shadow"
                    data-slider-options='{ "slidesPerView": 2, "spaceBetween":0, "speed": 6000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 } }, "effect": "slide" }'>
                    <div class="swiper-wrapper marquee-slide">
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-01.png') }}"
                                    class="h-40px xs-h-30px" alt="" />
                                <span>Kitchen</span>
                            </a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-02.png') }}"
                                    class="h-40px xs-h-30px" alt="" /><span>Leaving Room</span></a>

                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-03.png') }}"
                                    class="h-40px xs-h-30px" alt="" /><span>Bath Room</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-04.png') }}"
                                    class="h-40px xs-h-30px" alt="" /><span>BedRoom</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-05.png') }}"
                                    class="h-40px xs-h-30px" alt="" /><span>Parking Floor</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset('assets/images/applications/hm-use-06.png') }}"
                                    class="h-40px xs-h-30px" alt="" /><span>Shoping Mall</span></a>
                        </div>
                        <!-- end client item -->

                    </div>
                </div>
    </section>
    <!-- start section -->
    <section>
        <div class="container p-0">
            <div class="row  md-p-5">

                <div class="col-lg-12 order-1 order-lg-2 md-mb-50px">
                    <h4 class="text-dark-gray fw-700 ls-minus-1px alt-font mb-20px d-block flo">Step into Luxury with
                        Our
                        Exquisite Ceramic Tiles.</h4>
                    <p>Transform your space into a masterpiece with our ceramic tiles. Whether you're renovating a
                        residential or commercial property, these tiles offer unparalleled elegance and durability.
                        Experience the grandeur of large-format tiling with our collection of ceramic tiles. Each tile
                        is meticulously crafted to enhance the visual appeal of any room, making a lasting impression on
                        guests and visitors.</p>
                </div>
            </div>
        </div>
        <!-- <div class="container-fluid p-0">
                    <img src="{{ asset('assets/images/image/about-7.jpg') }}" class="mt-30px md-mt-15px mb-60px md-mb-40px border-radius-0px w-100"
                        alt="">
                </div> -->

        <div class="parallaxone skrollr-parallax"> </div>


        <div class="conteiner pe-10 ps-10 pt-5 pb-0 m-0">
            <div class="row row-cols-1 row-cols-md-2 mb-30px md-mb-15px">
                <div class="col">
                    <span class="fs-24 alt-font text-dark-gray ls-minus-05px fw-700 mb-10px d-block">Lifestyle
                        in Ceramics</span>
                    <p class="w-90 sm-w-100"> From quiet mornings to vibrant evenings, our tiles keep pace with
                        your life.</p>
                </div>
                <div class="col">
                    <span class="fs-24 alt-font text-dark-gray ls-minus-05px fw-700 mb-10px d-block">Design That
                        Reflects</span>
                    <p class="w-90 sm-w-100">Our tiles are not just a part of your home, they are a reflection
                        of your life’s journey.</p>
                </div>
            </div>

            <h4 class="text-dark-gray fw-700 ls-minus-1px alt-font mb-40px lg-mb-30px d-block">Benefits of
                Ceramic tiles</h4>
            <div class="border border-color-extra-medium-gray border-radius-6px mb-40px xs-mb-30px overflow-hidden">
                <p class="ps-30px pe-30px pt-25px pb-25px border-bottom border-1 border-color-extra-medium-gray mb-0">
                    <span class="fw-600 text-dark-gray">Environmental Impact of Ceramic Tile:</span> Research
                    the environmental impact of ceramic tile production and disposal. Consider alternative
                    eco-friendly flooring options if sustainability is a priority for you.
                </p>
                <p
                    class="ps-30px pe-30px pt-25px pb-25px border-bottom border-1 border-color-extra-medium-gray mb-0 bg-solitude-blue">
                    <span class="fw-600 text-dark-gray">Beautiful Aesthetics: </span>Ceramic tile flooring is
                    also known for its beauty. Installing this type of floor is an easy way to instantly improve
                    your home’s décor. Modern ceramic tile manufacturers leverage advanced technology to print
                    or emboss intricate patterns on the flooring tiles.
                </p>
                <p class="ps-30px pe-30px pt-25px pb-25px mb-0"><span class="fw-600 text-dark-gray">Low
                        Maintenance Requirements: </span>The smooth and non-porous surface of ceramic tiles
                    simplifies the cleaning process, requiring minimal effort to keep them looking pristine.</p>
            </div>
            <!-- <div class="row align-items-center justify-content-center g-0">

                            </div> -->
        </div>
    </section>
    <!-- end section -->
@endsection
