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
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>High-Precision
                        Technology</h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">Our Technology</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <div class="container pt-5 ">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-md-1 justify-content-center text-left"
                data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <h2 class="text-dark-gray fw-700">Technology</h2>
                <p>At IBON, we are proud to house the most advanced technology and top-class machines to manufacture our
                    products. Our commitment to innovation and excellence ensures that every tile we produce meets the
                    highest standards of quality and luxury. <br>
                    Our state-of-the-art manufacturing facilities are equipped with the latest technology, allowing us
                    to produce tiles that are not only beautiful but also durable and reliable. </p>

            </div>
        </div>
    </div>
    <div class="container pb-5">
        <figure class="position-relative mb-0 overflow-hidden shadow-in skrollable skrollable-between"
            data-shadow-animation="true" data-bottom-top="transform: translateY(70px)"
            data-top-bottom="transform: translateY(-70px)" style="transform: translateY(6.96314px);">
            <img src="{{asset('assets/images/image/packag-1.jpg')}}" class="w-150 h-400 border-radius-6px" alt="" data-no-retina="">
        </figure>
    </div>

    <div class="container pb-5 md-p-7" data-aos="fade-up" data-aos-duration="800">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-12 border border-color-extra-medium-gray border-radius-6px overflow-hidden p-0">
                        <h2 class="text-dark-gray p-20px border-bottom">Precision Engineering</h2>
                        <p class="p-20px"><b class="text-dark-gray">Precision Engineering:</b>Our advanced machinery
                            allows for
                            precise cutting, shaping, and finishing of each tile, ensuring uniformity and perfection in
                            every
                            piece.</p>
                        <p class="bg-solitude-blue p-20px"><b class="text-dark-gray">Innovative Processes:</b>We utilize
                            cutting-edge technology in our production processes, from automated material handling to
                            advanced
                            kiln operations, to enhance efficiency and product quality.</p>
                        <p class="p-20px"><b class="text-dark-gray">Quality Control:</b>Rigorous quality control
                            measures are
                            integrated into every stage of production, ensuring that each tile meets our exacting
                            standards
                            before it reaches our customers.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="row ps-5px md-ps-0">
                    <div class="col-12 border border-color-extra-medium-gray border-radius-6px overflow-hidden p-0">
                        <h2 class="text-dark-gray p-20px border-bottom">Luxury with Quality</h2>
                        <p class="p-20px"><b class="text-dark-gray">Exquisite Designs:</b>Our design team works
                            tirelessly
                            to
                            create tiles that are not only functional but also works of art, offering a range of styles
                            to
                            suit
                            any taste.</p>
                        <p class="bg-solitude-blue p-20px"><b class="text-dark-gray">Sustainable Practices:</b>We are
                            committed to
                            sustainable
                            manufacturing practices, ensuring that our products are as environmentally friendly as they
                            are
                            luxurious.</p>
                        <p class=" p-20px"><b class="text-dark-gray">Premium Materials: </b>We source
                            the
                            finest
                            materials to ensure that our tiles are not only beautiful but also robust and long-lasting.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
