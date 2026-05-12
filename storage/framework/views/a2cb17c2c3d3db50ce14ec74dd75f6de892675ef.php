
<?php $__env->startSection('title', 'We Garnish The Architect'); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $main_categories = \App\Models\Category::where('parent_id', 0)->get();
    ?>
    <!-- start banner -->
    <section class="p-0 full-screen md-h-600px sm-h-500px section-dark" data-parallax-background-ratio="0.8"
        style="background-image: url('https://via.placeholder.com/1920x1100')">
        <div class="h-100">
            <div class="swiper lg-no-parallax magic-cursor  full-screen h-100 ipad-top-space-margin swiper-light-pagination"
                data-slider-options='{ "slidesPerView": 1, "loop": true, "parallax": true, "speed": 1000, "pagination": { "el": ".swiper-pagination-bullets", "clickable": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 4000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- start slider item -->
                        <div class="swiper-slide overflow-hidden">
                            <div class="cover-background position-absolute top-0 start-0 w-100 h-100"
                                data-swiper-parallax="500"
                                style="background-image:url(<?php echo e(\App\Services\Helpers::uploaded_asset($slider->image)); ?>);">
                                <div class="opacity-light bg-gradient-sherpa-blue-black"></div>
                                <div class="container h-100 px-lg-5 px-md-5" data-swiper-parallax="-500">
                                    <div class="row align-items-center h-100 slide-bottom-custom-lg-screen mt-7">
                                        <?php echo $slider->slider_text ?? ''; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end slider item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- start slider pagination -->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                <!-- end slider pagination -->
                <!-- start slider navigation -->
                <!--<div class="slider-one-slide-prev-1 icon-extra-large text-white swiper-button-prev slider-navigation-style-06 d-none d-sm-inline-block"><i class="line-icon-Arrow-OutLeft"></i></div>
                                                <div class="slider-one-slide-next-1 icon-extra-large text-white swiper-button-next slider-navigation-style-06 d-none d-sm-inline-block"><i class="line-icon-Arrow-OutRight"></i></div>-->
                <!-- end slider navigation -->
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- start section -->
    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-md-11 md-mb-60px sm-mb-40px">
                    <div class="row mt-10 align-items-center">

                        <div class="col-xl-6 col-lg-6 col-sm-5 xs-mb-25px text-center sm-p-5" data-aos="zoom-in">
                            <div>
                                <img src="<?php echo e(asset('assets/images/image/welcome-2.jpg')); ?>" class="welcome-height">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-7 ps-45px lg-ps-15px last-paragraph-no-margin text-center text-sm-start"
                            data-anime='{  "opacity": [0,1], "delay": 100, "staggervalue": 250, "easing": "easeOutQuad" }'>
                            <h5 class="fw-600 text-dark-gray ls-minus-1px mb-15px"> Welcome to IBON</h5>
                            <p>Ibon Tiles brings you an extensive collection of designs that cater to every mood, every
                                room, and every dream.</p>
                            <a href="#"
                                class="btn btn-link btn-hover-animation-switch btn-extra-large text-base-color text-transform-none fw-600 mt-15px">
                                <span>
                                    <span class="btn-text">Discover now</span>
                                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather icon-feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-11 contact-form-style-01 position-relative">
                    <div class="position-absolute left-minus-25px md-left-minus-5px xs-left-0 top-100px md-top-0px">
                        <img src="<?php echo e(asset('assets/images/demo-accounting-home-left-img.jpg')); ?>" class="w-40px"
                            alt="">
                    </div>
                    <div class="ps-14 pe-14 pt-12 pb-10 lg-p-10 bg-white box-shadow-quadruple-large border-radius-6px">
                        <h6 class="d-inline-block fw-600 text-dark-gray ls-minus-1px mb-35px sm-mb-25px fs-20"
                            data-anime='{ "translateY": [15, 0], "translateX": [-15, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            How may we help you?</h6>
                        <!-- start contact form -->
                        <form action="email-templates/contact-form.php" method="post"
                            data-anime='{ "el": "childs", "translateY": [15, 0], "translateX": [-15, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="position-relative form-group mb-15px">
                                <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                <input type="text" name="name" class="form-control required"
                                    placeholder="Your name*" />
                            </div>
                            <div class="position-relative form-group mb-15px">
                                <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control required"
                                    placeholder="Your email address*" />
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="mt"> <img
                                            src="<?php echo e(asset('assets/images/image/phone.svg')); ?>"></i></span>
                                <input type="tel" name="phone" class="form-control" placeholder="phone" />
                            </div>


                            <div class="position-relative form-group mb-10px">
                                <span class="form-icon"><i class=""><img
                                            src="<?php echo e(asset('assets/images/image/message-icon.svg')); ?>"></i></span>
                                <input type="Text" name="message" class="form-control" placeholder="message" />
                            </div>
                            <div class="position-relative terms-condition-box text-start d-inline-block">
                            </div>
                            <div class="position-relative mt-10px">
                                <button class="btn btn-large btn-round-edge btn-base-color btn-box-shadow submit w-100"
                                    type="submit">Submit</button>
                                <div class="form-results mt-20px text-center lh-24 d-none"></div>
                            </div>
                        </form>
                        <!-- end contact form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-6 text-center text-lg-start">
                <div class="col-xl-5 col-lg-5 md-mb-20px"
                    data-anime='{ "translateX": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h4 class="text-dark-gray fw-700 mb-0 ls-minus-1px">Our products collection</h4>
                </div>
                <div class="col-xl-5 col-lg-5 last-paragraph-no-margin md-mb-30px"
                    data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <p class="w-90 xl-w-100 md-w-80 sm-w-100 md-mx-auto">Discover the essence of elegance in our ceramic
                        tiles collection, designed to elevate every room with timeless charm and contemporary flair.</p>
                </div>
                <div class="col-xl-2 col-lg-2 d-flex justify-content-center justify-content-lg-end"
                    data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <!-- start slider navigation -->
                    <div
                        class="slider-one-slide-prev-1 icon-small text-dark-gray swiper-button-prev slider-navigation-style-04 bg-white text-dark-gray box-shadow-large">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <div
                        class="slider-one-slide-next-1 icon-small text-dark-gray swiper-button-next slider-navigation-style-04 bg-white text-dark-gray box-shadow-large">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                    <!-- end slider navigation -->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <div class="outside-box-right-40 xs-outside-box-right-0"
                        data-anime='{ "translateX": [100, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <div class="swiper magic-cursor"
                            data-slider-options='{ "slidesPerView": 1, "spaceBetween": 28, "loop": true, "autoplay": { "delay": 2000, "disableOnInteraction": false }, "pagination": { "el": ".slider-four-slide-pagination-1", "clickable": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 }, "576": { "slidesPerView": 2 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- start content carousal item -->
                                    <div class="swiper-slide">
                                        <div class="interactive-banner-style-08">
                                            <figure
                                                class="m-0 hover-box overflow-hidden position-relative border-radius-6px">
                                                <a href="<?php echo e(route('site.category', $item->slug)); ?>">
                                                    <img src="<?php echo e($item->banner_url); ?>" alt=""
                                                        style="aspect-ratio:60/69;object-fit:cover" />
                                                </a>
                                                <figcaption
                                                    class="d-flex flex-column align-items-start justify-content-center position-absolute left-0px top-0px w-100 h-100 z-index-1 p-14 lg-p-12">
                                                    <a href="<?php echo e(route('site.category', $item->slug)); ?>">
                                                        <i class="line-icon-Medal-2 text-white icon-extra-large"></i>
                                                    </a>
                                                    <div class="mt-auto d-flex w-100 align-items-center">
                                                        <div class="col last-paragraph-no-margin">
                                                            <a href="<?php echo e(route('site.category', $item->slug)); ?>"
                                                                class="text-white fs-24 lh-28 w-65 xl-w-75 d-block"><?php echo e($item->name); ?></a>
                                                        </div>
                                                        <a href="<?php echo e(route('site.category', $item->slug)); ?>"
                                                            class="circle-box bg-yellow w-50px h-50px rounded-circle ms-auto position-relative rounded-box">
                                                            <i
                                                                class="bi bi-arrow-right-short absolute-middle-center icon-very-medium lh-0px color"></i>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-gray-light-dark-transparent z-index-minus-1 opacity-9">
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- end content carousal item -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                    <!-- start slider pagination -->
                    <!--<div class="swiper-pagination slider-four-slide-pagination-1 swiper-pagination-style-2 swiper-pagination-clickable swiper-pagination-bullets"></div>-->
                    <!-- end slider pagination -->
                </div>
            </div>

            <div class="row position-relative clients-style-08 mb-5 mt-5 sm-mb-40px"
                data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col swiper text-center feather-shadow"
                    data-slider-options='{ "slidesPerView": 2, "spaceBetween":0, "speed": 6000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 } }, "effect": "slide" }'>
                    <div class="swiper-wrapper marquee-slide">
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-01.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" />
                                <span>Kitchen</span>
                            </a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-02.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" /><span>Leaving Room</span></a>

                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-03.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" /><span>Bath Room</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-04.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" /><span>BedRoom</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-05.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" /><span>Parking Floor</span></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="<?php echo e(asset('assets/images/applications/hm-use-06.png')); ?>"
                                    class="h-40px xs-h-30px" alt="" /><span>Shoping Mall</span></a>
                        </div>
                        <!-- end client item -->

                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center"
                data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <!--<div class="col-12 text-center">
                                            <div
                                                class="d-inline-block align-middle bg-yellow fw-600 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 me-10px lh-30 sm-m-5px">
                                                Trust</div>
                                            <div class="d-inline-block align-middle text-dark-gray fs-19 fw-600 ls-minus-05px">Exports in the
                                                <span class="text-decoration-line-bottom text-dark-gray">24+ companies</span> and 2000+ trusting
                                                and happying clients.
                                            </div>
                                        </div>-->
            </div>

        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="bg-very-light-gray pb-0" id="services">
        <div class="container">
            <div class="row mb-8 sm-mb-10">
                <div class="col-12 tab-style-08">
                    <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane fade in active show" id="tab_eight1">
                            <div class="row align-items-center justify-content-center g-lg-0">
                                <div class="col-md-6 sm-mb-30px position-relative overflow-hidden"
                                    data-anime='{ "effect": "slide", "color": "#005153", "direction":"lr", "easing": "easeOutQuad", "delay":50}'>
                                    <img src="<?php echo e(asset('assets/images/image/image-1.jpg')); ?>" alt=""
                                        class="w-100 border-radius-6px">
                                    <div class="bg-very-light-gray w-250px position-absolute pt-20px pb-20px ps-25px pe-25px border-radius-4px bottom-30px left-35px box-shadow-large d-flex align-items-center"
                                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 800, "staggervalue": 500, "easing": "easeOutQuad" }'>
                                        <h2 class="vertical-counter d-inline-flex text-dark-gray fw-700 ls-minus-2px md-ls-minus-1px mb-0 text-nowrap border-end border-1 border-color-transparent-dark-very-light pe-20px me-20px"
                                            data-to="85"></h2>
                                        <span class="text-dark-gray ls-minus-05px d-inline-block lh-22">Project
                                            completed</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 offset-lg-1 col-md-6 text-center text-md-start"
                                    data-anime='{ "el": "childs", "translateX": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                    <div class="mb-20px">
                                        <div
                                            class="separator-line-1px w-50px bg-base-color d-inline-block align-middle me-10px opacity-2">
                                        </div>
                                        <span
                                            class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">Core
                                            Purpose</span>
                                    </div>
                                    <h4 class="fw-700 text-dark-gray ls-minus-1px md-mb-20px">Innovation, Quality &
                                        Services</h4>
                                    <p class="mb-35px md-mb-25px">IBON believes in superior customer service,
                                        Innovation, Quality & Commitment. Our prime motto will be our valued customers
                                        and so every strategy the need of consumers, resulting in the creation of a
                                        value system in ceramic industries!</p>
                                    <a href="#"
                                        class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">Learn
                                        more<span class="bg-base-color text-white"><i
                                                class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_eight2">
                            <div class="row align-items-center justify-content-center g-lg-0">
                                <div class="col-md-6 sm-mb-30px position-relative overflow-hidden">
                                    <img src="<?php echo e(asset('assets/images/image/image-3.jpg')); ?>" alt=""
                                        class="w-100 border-radius-4px">
                                    <div
                                        class="bg-very-light-gray w-250px position-absolute pt-20px pb-20px ps-25px pe-25px border-radius-4px bottom-30px left-35px box-shadow-large d-flex align-items-center">
                                        <h2 class="vertical-counter d-inline-flex text-dark-gray fw-700 ls-minus-2px md-ls-minus-1px mb-0 text-nowrap border-end border-1 border-color-transparent-dark-very-light pe-20px me-20px"
                                            data-to="80"></h2>
                                        <span class="text-dark-gray ls-minus-05px d-inline-block lh-22">Brand Promise
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 offset-lg-1 col-md-6 text-center text-md-start">
                                    <div class="mb-20px">
                                        <div
                                            class="separator-line-1px w-50px bg-base-color d-inline-block align-middle me-10px opacity-2">
                                        </div>
                                        <span
                                            class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">Quality
                                            Assurance</span>
                                    </div>
                                    <h4 class="fw-700 text-dark-gray ls-minus-1px md-mb-20px">Quality Crafted, Strategy
                                        Perfected.</h4>
                                    <p class="mb-35px md-mb-25px">Our dedication to quality begins with the careful
                                        selection of materials, where we partner with trusted suppliers who share our
                                        commitment to excellence. Through rigorous quality control measures and
                                        meticulous attention to detail, we maintain strict quality standards at every
                                        stage of production. Our skilled workforce, equipped with the latest technology
                                        and tools, works tirelessly to uphold these standards, resulting in products
                                        that are not just good but exceptional. </p>
                                    <a href="demo-accounting-services.html"
                                        class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">Learn
                                        more<span class="bg-base-color text-white"><i
                                                class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_eight3">
                            <div class="row align-items-center justify-content-center g-lg-0">
                                <div class="col-md-6 sm-mb-30px position-relative overflow-hidden">
                                    <img src="<?php echo e(asset('assets/images/image/image-2.jpg')); ?>" alt=""
                                        class="w-100 border-radius-4px">
                                    <div
                                        class="bg-very-light-gray w-250px position-absolute pt-20px pb-20px ps-25px pe-25px border-radius-4px bottom-30px left-35px box-shadow-large d-flex align-items-center">
                                        <h2 class="vertical-counter d-inline-flex text-dark-gray fw-700 ls-minus-2px md-ls-minus-1px mb-0 text-nowrap border-end border-1 border-color-transparent-dark-very-light pe-20px me-20px"
                                            data-to="85"></h2>
                                        <span class="text-dark-gray ls-minus-05px d-inline-block lh-22">Core
                                            Purpose</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 offset-lg-1 col-md-6 text-center text-md-start">
                                    <div class="mb-20px">
                                        <div
                                            class="separator-line-1px w-50px bg-base-color d-inline-block align-middle me-10px opacity-2">
                                        </div>
                                        <span
                                            class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">Core
                                            Purpose</span>
                                    </div>
                                    <h4 class="fw-700 text-dark-gray ls-minus-1px md-mb-20px">Make it global and
                                        demanded.</h4>
                                    <p class="mb-35px md-mb-25px">In a world connected by commerce and communication,
                                        quality has emerged as the universal currency of success. At IBON Group products
                                        stand as testaments to this principle, sought after and demanded across the
                                        globe. With a steadfast commitment to excellence and a keen understanding of
                                        diverse markets, we've cultivated a reputation for delivering products that
                                        exceed expectations and resonate with consumers worldwide. </p>
                                    <a href="demo-accounting-services.html"
                                        class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">Learn
                                        more<span class="bg-base-color text-white"><i
                                                class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_eight4">
                            <div class="row align-items-center justify-content-center g-lg-0">
                                <div class="col-md-6 sm-mb-30px position-relative overflow-hidden">
                                    <img src="<?php echo e(asset('assets/images/image/image-6.jpg')); ?>" alt=""
                                        class="w-100 border-radius-4px">
                                    <div
                                        class="bg-very-light-gray w-250px position-absolute pt-20px pb-20px ps-25px pe-25px border-radius-4px bottom-30px left-35px box-shadow-large d-flex align-items-center">
                                        <h2 class="vertical-counter d-inline-flex text-dark-gray fw-700 ls-minus-2px md-ls-minus-1px mb-0 text-nowrap border-end border-1 border-color-transparent-dark-very-light pe-20px me-20px"
                                            data-to="80"></h2>
                                        <span class="text-dark-gray ls-minus-05px d-inline-block lh-22">Project
                                            completed</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 offset-lg-1 col-md-6 text-center text-md-start">
                                    <div class="mb-20px">
                                        <div
                                            class="separator-line-1px w-50px bg-base-color d-inline-block align-middle me-10px opacity-2">
                                        </div>
                                        <span
                                            class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">Brand
                                            Value</span>
                                    </div>
                                    <h4 class="fw-700 text-dark-gray ls-minus-1px md-mb-20px">We are leader in Tiles
                                        Business</h4>
                                    <p class="mb-35px md-mb-25px">At IBON Group don't just sell tiles; we inspire
                                        creativity, transform spaces, and elevate lifestyles. Our commitment to quality,
                                        innovation, and customer satisfaction is what sets us apart and drives us to
                                        continuously raise the bar in the tiles business. Join us as we continue to lead
                                        the way, setting new standards of excellence in the tiles industry.</p>
                                    <a href="demo-accounting-services.html"
                                        class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">Learn
                                        more<span class="bg-base-color text-white"><i
                                                class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-style-08 border-bottom border-color-extra-medium-gray bg-white box-shadow-quadruple-large">
            <div class="container">
                <!-- start tab navigation -->
                <ul class="nav nav-tabs border-0 fw-500 fs-19 text-center">
                    <li class="nav-item"><a data-bs-toggle="tab" href="#tab_eight1" class="nav-link active">Core
                            Value<span class="tab-border bg-base-color"></span></a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_eight2"
                            data-tab="counter">Quality<span class="tab-border bg-base-color"></span></a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_eight3"
                            data-tab="counter">Core Purpose<span class="tab-border bg-base-color"></span></a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_eight4"
                            data-tab="counter">Brand Value<span class="tab-border bg-base-color"></span></a></li>
                </ul>
                <!-- end tab navigation -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center mb-7 md-mb-4">
                <div class="col-xl-5 col-lg-6 col-md-12 md-mb-50px sm-mb-40px text-center text-lg-start">
                    <h4 class="fw-700 mb-0 text-dark-gray ls-minus-1px"
                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                        Unleash Your Imagination with Our Ceramic Masterpieces.</h4>
                </div>
                <div class="col-lg-6 offset-xl-1 text-center text-lg-start">
                    <div class="row align-items-center justify-content-center justify-content-lg-start">
                        <!-- start counter item -->
                        <div class="col-sm-6 last-paragraph-no-margin counter-style-04 md-mb-35px">
                            <h2 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px mb-5px"
                                data-text="%" data-to="100"><sup class="text-emerald-green top-minus-5px"></sup></h2>
                            <span class="fs-19 fw-600 ls-minus-05px mb-5px d-block text-dark-gray"
                                data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>Customer
                                Satisfaction</span>
                            <!--<p class="w-90 sm-w-100 md-mx-auto"
                                                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                                                        Real-Time Insights, Real-Time Decisions: The Power of Cloud Accounting.</p>-->
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col-sm-6 last-paragraph-no-margin counter-style-04 md-mb-35px">
                            <h2 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px mb-5px"
                                data-text="%" data-to="100"><sup class="text-emerald-green top-minus-5px"></sup></h2>
                            <span class="fs-19 fw-600 ls-minus-05px mb-5px d-block text-dark-gray"
                                data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>Delivery
                                on time</span>
                            <!--<p class="w-90 sm-w-100 md-mx-auto"
                                                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                                                        Outsource Smarter, Achieve More</p>-->
                        </div>
                        <!-- end counter item -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-left mb-7 md-mb-4">
                <div class="col-xl-5 col-lg-6 col-md-12 md-mb-50px sm-mb-40px text-center text-lg-start" id="pro">
                    <h4 class="fw-700 mb-0 text-dark-gray ls-minus-1px"
                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                        Customer Review</h4>
                </div>
                <div class="row m-0 align-items-center justify-content-center border border-color-extra-medium-gray border-radius-100px md-border-radius-6px ps-10px pe-10px box-shadow-quadruple-large"
                    data-anime='{ "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="col-lg-10">
                        <div class="swiper slider-one-slide testimonials-style-09"
                            data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <div
                                        class="row align-items-center pt-2
                                    
                                    5px pb-25px">
                                        <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                            <img src="<?php echo e(asset('assets/images/image/Character-2.png')); ?>"
                                                class="rounded-circle w-100px h-100px mt-10px md-mb-35px round"
                                                alt="">
                                            <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                    src="<?php echo e(asset('assets/images/demo-accounting-home-quote-img.png')); ?>"
                                                    class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                    alt=""> IBON ceramic tiles transformed my space, exceeding all
                                                expectations. Their dedication to customer satisfaction ensures I'll be
                                                returning for future projects.</span>
                                        </div>
                                        <div class="col-lg-1 d-none d-lg-inline-block">
                                            <div
                                                class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                            <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Hitesh
                                                k. Gajjar</span>
                                            <!--<div>IBON Group</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <div
                                        class="row align-items-center pt-2
                                    
                                    5px pb-25px">
                                        <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                            <img src="<?php echo e(asset('assets/images/image/Character-2.png')); ?>"
                                                class="rounded-circle w-100px h-100px mt-10px md-mb-35px" alt="">
                                            <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                    src="<?php echo e(asset('assets/images/demo-accounting-home-quote-img.png')); ?>"
                                                    class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                    alt="">Experience the transformative power of IBON ceramic
                                                tiles,
                                                surpassing expectations with every installation</span>
                                        </div>
                                        <div class="col-lg-1 d-none d-lg-inline-block">
                                            <div
                                                class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                            <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Sagil
                                                Kakkrechha</span>
                                            <!--<div>IBON Group</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <div class="row align-items-center pt-25px pb-25px">
                                        <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start ">
                                            <img src="<?php echo e(asset('assets/images/image/Character-2.png')); ?>"
                                                class="rounded-circle w-100px h-100px mt-10px md-mb-35px round"
                                                alt="">
                                            <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                    src="<?php echo e(asset('assets/images/demo-accounting-home-quote-img.png')); ?>"
                                                    class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                    alt="">The staff was incredibly helpful in guiding me through
                                                the
                                                selection process, taking the time to understand my preferences and
                                                offering valuable recommendations.</span>
                                        </div>
                                        <div class="col-lg-1 d-none d-lg-inline-block">
                                            <div
                                                class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                            <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Meet
                                                Vala</span>
                                            <!--<div>IBON Group</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 md-mb-25px">
                        <div class="d-flex justify-content-center">
                            <!-- start slider navigation -->
                            <div
                                class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-04 bg-very-light-gray">
                                <i class="fa-solid fa-arrow-left icon-small text-dark-gray"></i>
                            </div>
                            <div
                                class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-04 bg-very-light-gray">
                                <i class="fa-solid fa-arrow-right icon-small text-dark-gray"></i>
                            </div>
                            <!-- end slider navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/fontend/pages/home.blade.php ENDPATH**/ ?>