<header class="header-with-topbar">
    <!-- start header top bar -->
    <div class="header-top-bar top-bar-dark bg-very-light-gray" style="top: 0px;">
        <div class="container-fluid">
            <div class="row h-45px xs-h-auto align-items-center m-0 xs-pt-5px xs-pb-5px">
                <div class="col-lg-6 col-md-7 text-center text-md-start xs-px-0">
                    <div class="fs-15 text-dark-gray fw-500">Our sales executive waiting for you! <a
                            href="<?php echo e(route('site.contact')); ?>"
                            class="text-dark-gray text-decoration-line-bottom fw-600">Contact
                            now</a></div>
                </div>
                <div class="col-lg-6 col-md-5 text-end d-none d-md-flex">
                    <div class="widget fs-15 fw-500 me-35px lg-me-25px md-me-0 text-dark-gray"><a class="text-dark-gray"
                            href="tel:<?php echo e(site_settings('phone')); ?>"><i class="feather icon-feather-phone-call"></i><?php echo e(site_settings('phone', false)); ?></a>
                    </div>
                    <div class="widget fs-15 fw-500 text-dark-gray d-none d-lg-inline-block"><i
                            class="feather icon-feather-map-pin"></i><?php echo e(site_settings('address') ?? 'Morbi, India'); ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top bar -->
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg header-light bg-white responsive-sticky">
        <div class="container-fluid">
            <div class="col-auto col-lg-2 me-lg-0 me-auto">
                <a class="navbar-brand" href="<?php echo e(route('site.home')); ?>">    
                    <img src="<?php echo e(site_settings('logo')); ?>"
                        data-at2x="<?php echo e(site_settings('logo')); ?>" alt="<?php echo e(site_settings('company_name')); ?>" class="default-logo">
                    <img src="<?php echo e(site_settings('logo')); ?>"
                        data-at2x="<?php echo e(site_settings('logo')); ?>" alt="<?php echo e(site_settings('company_name')); ?>" class="alt-logo">
                    <img src="<?php echo e(site_settings('logo')); ?>"
                        data-at2x="<?php echo e(site_settings('logo')); ?>" alt="<?php echo e(site_settings('company_name')); ?>"
                        class="mobile-logo h-180 z-index-1">
                </a>
            </div>
            <div class="col-auto menu-order position-static">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav fw-600">
                        <li class="nav-item <?php echo e(request()->routeIs('site.home') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('site.home')); ?>" class="nav-link">Home</a>
                        </li>
                        <li
                            class="nav-item dropdown dropdown-with-icon-style02 <?php echo e(request()->routeIs('site.about') ? 'active' : ''); ?> <?php echo e(request()->routeIs('site.about') ? 'active' : ''); ?> <?php echo e(request()->routeIs('site.about') ? 'active' : ''); ?>">
                            <a href="#" class="nav-link" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">About</a>
                            <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="<?php echo e(route('site.about')); ?>">Company Profile</a></li>
                                <li><a href="<?php echo e(route('site.cdm_message')); ?>">CDM Message</a></li>
                                <li><a href="<?php echo e(route('site.product_quality')); ?>">Technology</a></li>
                            </ul>
                        </li>
                        <li
                            class="nav-item dropdown dropdown-with-icon-style02  <?php echo e(request()->routeIs('site.product_detail') ? 'active' : ''); ?>  <?php echo e(request()->routeIs('site.category') ? 'active' : ''); ?> <?php echo e(request()->routeIs('site.product') ? 'active' : ''); ?>">
                            <a href="#" class="nav-link" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Our Products</a>
                            <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a href="<?php echo e(route('site.category')); ?>">Collection</a></li>
                                <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('site.category', $m_cat->slug)); ?>"><?php echo e($m_cat->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo e(route('site.export')); ?>" class="nav-link">Exports</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo e(route('site.catalogue')); ?>" class="nav-link">Catalogue</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo e(route('site.product_information')); ?>"
                                class="nav-link">Information</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo e(route('site.contact')); ?>" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/fontend/include/header.blade.php ENDPATH**/ ?>