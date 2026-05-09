@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor"
        style="background-image: url({{asset('assets/images/image/Capture.PNG')}})">
        <div class="container">
            <div class="row extra-very-small-screen align-items-center pt-9 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px xs-mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>About
                    </h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">CDM Message</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-4 col-md-12 order-md-1 justify-content-center mb-5">
                <img src="{{asset('assets/images/image/cdm.png')}}" class="welcome-height" style="object-fit: cover;">
            </div>
            <div class="col-lg-8 col-md-12 order-md-2 border-1">
                <h2 class="text-dark-gray fw-500 p-0">Introducing IBON</h2>
                <p>India stands as one of the foremost producers of ceramic tiles globally, creating a competitive and
                    innovative market. Introducing a unique and useful product in this vast industry is a challenge we
                    have embraced with determination. Our mission has been to create products that meet the demands of
                    modern architecture with unparalleled precision and quality. With this vision, we proudly present
                    our brand, IBON.</p>
                <h6><b class="text-dark-gray">Elevating Surfaces to New Heights</b>
                </h6>
                <p>IBON is committed to developing stylish and sophisticated surfaces that allow customers to experience
                    a grand, larger-than-life lifestyle. Our full-body tiles are designed to create luxurious and
                    spacious environments, perfect for those who seek elegance and grandeur in their spaces. Here’s what
                    sets IBON apart:</p>
                <h6 class="text-dark-gray" style="font-size: 20px;"><b>Mr. xyz ,CDM</b>

                </h6>
            </div>
        </div>
    </div>
@endsection
