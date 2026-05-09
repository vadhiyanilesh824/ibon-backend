@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')

    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor" id="small"
        style="background-image: url({{asset('assets/images/image/export-6.png')}});">
        <div class="container">
            <div class="row extra-very-small-screen pt-10 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>Export
                        Quality Tiles</h1>
                    <h3 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">Export</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- start section -->
    <div class="container pt-5">
        <div class="row align-items-center justify-content-center mb-7">
            <div class="col-xl-5 col-lg-6 mb-30px appear anime-child anime-complete"
                data-anime="{ &quot;el&quot;: &quot;childs&quot;, &quot;translateY&quot;: [30, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;: 0, &quot;staggervalue&quot;: 300, &quot;easing&quot;: &quot;easeOutQuad&quot; }">
                <div class="row row-cols-1">

                    <div class="col-12 process-step-style-05 position-relative hover-box"data-aos="fade-right"
                        data-aos-duration="600">
                        <div class="process-step-item d-flex">
                            <div class="process-step-icon-wrap position-relative">
                                <div
                                    class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-white position-relative box-shadow-bottom will-change-transform">
                                    <span class="number position-relative z-index-1 text-dark-gray fw-600">01</span>
                                    <div class="box-overlay bg-dark-gray rounded-circle"></div>
                                </div>
                                <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                            </div>
                            <div class="process-content ps-35px sm-ps-25px last-paragraph-no-margin mb-40px">
                                <!-- <span class="d-block fw-600 text-dark-gray fs-17 mb-5px">Discussion of the idea</span> -->
                                <p class="w-90 sm-w-100">We specialize in exporting top-tier tiles that meet international
                                    standards, ensuring durability and aesthetic appeal for any project.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 process-step-style-05 position-relative hover-box" data-aos="fade-right"
                        data-aos-duration="800">
                        <div class="process-step-item d-flex">
                            <div class="process-step-icon-wrap position-relative">
                                <div
                                    class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-white position-relative box-shadow-bottom will-change-transform">
                                    <span class="number position-relative z-index-1 text-dark-gray fw-600">02</span>
                                    <div class="box-overlay bg-dark-gray rounded-circle"></div>
                                </div>
                                <span class="progress-step-separator bg-dark-gray opacity-1"></span>
                            </div>
                            <div class="process-content ps-35px sm-ps-25px last-paragraph-no-margin mb-40px">
                                <!-- <span class="d-block fw-600 text-dark-gray fs-17 mb-5px">Handcrafted solutions</span> -->
                                <p class="w-90 sm-w-100">Our commitment to excellence in tile production and exportation
                                    guarantees that each shipment meets the highest standards of quality and design.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 process-step-style-05 position-relative hover-box" data-aos="fade-right"
                        data-aos-duration="1000">
                        <div class="process-step-item d-flex">
                            <div class="process-step-icon-wrap position-relative">
                                <div
                                    class="process-step-icon d-flex justify-content-center align-items-center mx-auto rounded-circle h-60px w-60px fs-14 bg-white position-relative box-shadow-bottom will-change-transform">
                                    <span class="number position-relative z-index-1 text-dark-gray fw-600">03</span>
                                    <div class="box-overlay bg-dark-gray rounded-circle"></div>
                                </div>
                            </div>
                            <div class="process-content ps-35px sm-ps-25px last-paragraph-no-margin mb-30px">
                                <!-- <span class="d-block fw-600 text-dark-gray fs-17 mb-5px">Completed project</span> -->
                                <p class="w-90 sm-w-100">Our tiles are crafted to perfection and exported with care,
                                    ensuring they arrive ready to elevate any environment.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 text-center md-mb-20px offset-xl-1">
                <figure class="position-relative mb-0 overflow-hidden shadow-in skrollable skrollable-between"
                    data-shadow-animation="true" data-bottom-top="transform: translateY(70px)"
                    data-top-bottom="transform: translateY(-70px)" style="transform: translateY(6.96314px);">
                    <img src="{{asset('assets/images/image/export-5.png')}}" class="w-150 h-400 border-radius-6px" alt=""
                        data-no-retina="">
                </figure>
            </div>
        </div>

    </div>

    <!-- end section -->
    <!-- start section -->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 text-dark-gray fw-700 text-center">
                    <h2>Our export network</h2>
                </div>
                <div class="col-12 col-md-12">
                    <p>Our tiles are available both nationally and internationally, ensuring that customers around the world
                        can experience their exceptional quality and design. We proudly export our tiles to all major
                        countries, continually expanding our network and growing our global client base.</p>
                </div>
            </div>
        </div>
        <div class="container pt-5 pb-5">
            <div class="row "data-aos="fade-up" data-aos-duration="800">
                <div class="col-xl-12 col-md-12 text-center">
                    <img src="{{asset('assets/images/image/map-3.png')}}" id="export-map" alt="">
                    <img src="{{asset('assets/images/image/Group 164.png')}}" class="mt-2" alt="" width="700">
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
