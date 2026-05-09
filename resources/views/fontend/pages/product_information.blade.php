@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor"
        style="background-image: url({{ asset('assets/images/image/information-1.png') }})">
        <div class="container">
            <div class="row extra-very-small-screen  pt-10 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px xs-mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>Product
                        Information
                    </h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">Information</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="bg-gradient-very-light-gray">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 text-center appear" data-aos="fade-up" data-aos-duration="800">
                    <h3 class="alt-font fw-500 text-dark-gray ls-minus-1px">
                        Discover Our Durable
                        Ceramic Tiles.
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center mb-5 xs-mb-8 " data-aos="fade-up"
                data-aos-duration="1000">

                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-shield-halved icon-extra-large"></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Durability</span>
                            <p>Built to last, our ceramic tiles withstand the test of time and traffic.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-temperature-three-quarters icon-extra-large"></i></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Heat
                                Resistance</span>
                            <p>Suitable for areas exposed to high temperatures, like kitchen backsplashes.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-flask icon-extra-large"></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Chemical
                                Resistance</span>
                            <p>Perfect Chemical-Resistant Ceramic Tiles for Your Home.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-dumbbell icon-extra-large"></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">High
                                Strength</span>
                            <p>Unmatched Durability: Ceramic Tiles Three Times Stronger Than Mosaic Floors.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center mb-5 xs-mb-8" data-aos="fade-out"
                data-aos-duration="800">

                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-droplet icon-extra-large"></i>
                            </span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Water
                                Resistance</span>
                            <p>Tiles that stand up to moisture, ensuring lasting beauty and functionality.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-snowflake incon icon-extra-large"></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Eco-Friendly</span>
                            <p>Go green with our eco-friendly ceramic tiles, made from natural materials.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-feather icon-extra-large"></i></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px"> Light
                                Weight</span>
                            <p>Strength Without the Weight Discover Our Lightweight Ceramic Tiles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-white feature-box box-shadow-quadruple-large box-shadow-quadruple-large-hover text-center p-16 lg-p-14 border-radius-10px last-paragraph-no-margin">
                        <div class="feature-box-icon mb-20px">
                            <span class="d-inline-block alt-font text-base-color mb-5px"><i
                                    class="fa-solid fa-soap icon-extra-large"></i></span>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fw-600 text-dark-gray fs-20 d-inline-block mb-5px">Easy Washing</span>
                            <p>Clean Living: Ceramic Floors with Low Water Absorption and Dust Resistance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0 ">
        <div class="container">
            <div class="row mb-3" data-aos="fade-up" data-aos-duration="1200">
                <div class="col-md-12 text-center ">
                    <h3 class="alt-font fw-500 text-dark-gray ls-minus-1px shadow-none shadow-in animated-bounce">
                        Product Information
                </div>
                <div class="col-md-12">
                    <p>The 600x1200 mm dimension is a versatile size that can be utilized in various applications across
                        different industries. This basic yet perfect size can be adapted for use in construction,
                        interior design, and industrial purposes.</p>
                    <p><b>Flooring and Wall Panels:</b> Tiles or panels of this dimension are ideal for flooring and
                        wall </p>
                    <p><b>Countertops and Workspaces:</b>Perfect for kitchen countertops or workbenches in laboratories
                        and workshops, offering ample space for tasks without being overly cumbersome.
                    </p>
                    <p><b>Display and Advertising Boards:</b>Ideal for use in retail environments or exhibitions as
                        display boards or advertisement panels due to their manageable size and effective display area.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0 ">
        <div class="container">
            <div class="row mb-3" data-aos="fade-up" data-aos-duration="1200">
                <div class="col-md-12 text-center ">
                    <h3 class="alt-font fw-500 text-dark-gray ls-minus-1px shadow-none shadow-in animated-bounce">
                        Packaging details
                </div>
                <div class="col-md-12">
                    <p>Our ceramic tiles are packaged with utmost care to ensure they reach you in perfect condition. We use
                        high-quality materials and innovative packaging techniques to protect each tile from damage during
                        transit and storage.</p>
                    <p><b>Flooring and Wall Panels:</b> Tiles or panels of this dimension are ideal for flooring and
                        wall </p>
                    <p><b>Countertops and Workspaces:</b>Perfect for kitchen countertops or workbenches in laboratories
                        and workshops, offering ample space for tasks without being overly cumbersome.
                    </p>
                    <p><b>Display and Advertising Boards:</b>Ideal for use in retail environments or exhibitions as
                        display boards or advertisement panels due to their manageable size and effective display area.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0 ">
        <div class="container">
            <div class="row mb-3 " data-aos="fade-up" data-aos-duration="1200">
                <div class="col-md-12 text-center ">
                    <h3 class="alt-font fw-500 text-dark-gray ls-minus-1px shadow-none shadow-in">Applications
                </div>
                <div class="col-md-12">
                    <p>Our products are designed to make your home look extra spacious and grand, bringing a touch of
                        extravagance and beauty that leaves a lasting impression on all who see it. With a variety of
                        applications for both indoor and outdoor spaces, our exquisite styles are perfect for adorning
                        walls and embellishing floors, providing a modern contemporary outlook and a serene vibe.<br>

                        We aim to uplift your lifestyle by achieving the impossible transforming the ordinary into the
                        extraordinary. Whether it's a cozy residential area or a bustling commercial space, our surfaces
                        beautifully enhance any environment.
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <section class="p-0 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 justify-content-center " data-aos="fade-up"
                data-aos-duration="800">

                <div class="col-md-4 col-sm-12">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-02.png') }}" class="h-60px xs-h-60px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">Leaving Room</span>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-01.png') }}" class="h-60px xs-h-50px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">Kitchen</span>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-03.png') }}" class="h-60px xs-h-50px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">Bath Room</span>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-04.png') }}" class="h-60px xs-h-50px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">BedRoom</span>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-05.png') }}" class="h-60px xs-h-50px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">Parking
                                Floor</span>

                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12 ">
                    <div class="feature-box p-8 overflow-hidden">
                        <div class="feature-box-icon">
                            <img src="{{ asset('assets/images/applications/hm-use-06.png') }}" class="h-60px xs-h-50px"
                                alt="" />
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 fs-20 text-dark-gray mb-5px">Shoping Mall</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="pb-0">
        <div class="container-fluid p-0">
            <video src="{{asset('assets/video/information-1.mp4')}}" autoplay loop muted class="border-radius-0px"></video>
        </div>
    </section>
@endsection
