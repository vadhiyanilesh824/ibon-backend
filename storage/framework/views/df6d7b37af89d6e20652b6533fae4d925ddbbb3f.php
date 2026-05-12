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
                        <a href="<?php echo e(route('site.contact')); ?>"
                            class="col btn btn-extra-large btn-yellow left-icon btn-box-shadow btn-rounded text-transform-none d-inline-block align-middle me-15px xs-m-5px xs-px-0"><i
                                class="feather icon-feather-mail"></i>Need support?</a>
                        <a href="tel:<?php echo e(site_settings('phone')); ?>"
                            class="col btn btn-extra-large btn-base-color left-icon btn-box-shadow btn-rounded d-inline-block align-middle xs-m-5px xs-px-0"><i
                                class="feather icon-feather-phone-call"></i><?php echo e(site_settings('phone')); ?></a>
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
                        src="<?php echo e(site_settings('logo')); ?>"
                        data-at2x="<?php echo e(site_settings('logo')); ?>" alt=""></a>

            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-12 xs-mb-30px order-sm-3 order-lg-2">
                <span class="fs-18 fw-400 d-block text-white mb-5px">About</span>
                <ul>
                    <li><a href="<?php echo e(route('site.product')); ?>">Our Product</a></li>
                    <li><a href="<?php echo e(route('site.export')); ?>">Export</a></li>
                    <li><a href="<?php echo e(route('site.catalogue')); ?>">Catalogue</a></li>
                    <li><a href="<?php echo e(route('site.product_information')); ?>">Information</a></li>
                    <li><a href="<?php echo e(route('site.contact')); ?>">Contect</a></li>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                <span class="fs-18 fw-400 d-block text-white mb-5px">Our Collection</span>
                <ul>
                    <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('site.category', $m_cat->slug)); ?>"><?php echo e($m_cat->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-12 col-lg col-sm-4 xs-mb-30px order-sm-5 order-lg-4 me-5 last-paragraph-no-margin">
                <span class="fs-18 fw-400 d-block text-white mb-5px">Get in touch</span>
                <a href="<?php echo e(route('site.contact')); ?>"><?php echo e(site_settings('address')); ?></a>

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
                <a href="mailto:<?php echo e(site_settings('receive_email')); ?>"><?php echo e(site_settings('receive_email')); ?></a>

                <span class="mt-10px fs-18 fw-400 d-block text-white mb-0">Customer care?</span>
                <a href="tel:<?php echo e(site_settings('phone')); ?>"><?php echo e(site_settings('phone')); ?></a>

                <span class="mt-10px fs-18 fw-400 d-block text-white mb-0">Follow us on</span>
                <div class="elements-social social-icon-style-02">
                    <ul class="small-icon light">
                        <?php if(site_settings('facebook_link') != null): ?>
                            <li><a class="facebook" href="<?php echo e(site_settings('facebook_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('instagram_link') != null): ?>
                            <li><a class="instagram" href="<?php echo e(site_settings('instagram_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-instagram"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('twitter_link') != null): ?>
                            <li><a class="twitter" href="<?php echo e(site_settings('twitter_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-twitter"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('linkedin_link') != null): ?>
                            <li><a class="linkedin" href="<?php echo e(site_settings('linkedin_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-linkedin"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('youtube_link') != null): ?>
                            <li><a class="youtube" href="<?php echo e(site_settings('youtube_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-youtube"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('pinterest_link') != null): ?>
                            <li><a class="pinterest" href="<?php echo e(site_settings('pinterest_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-pinterest"></i><span></span></a></li>
                        <?php endif; ?>
                        <?php if(site_settings('googleplus_link') != null): ?>
                            <li><a class="google" href="<?php echo e(site_settings('googleplus_link')); ?>" target="_blank"><i
                                        class="fa-brands fa-google"></i><span></span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>


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
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/fontend/include/footer.blade.php ENDPATH**/ ?>