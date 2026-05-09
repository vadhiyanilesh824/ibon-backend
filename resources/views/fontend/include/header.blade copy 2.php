<!-- start header -->
<header>
    <!-- start navigation -->
    <nav
        class="@if (!request()->routeIs('site.home')) navbar navbar-expand-lg header-transparent bg-transparent light  disable-fixed @else navbar navbar-expand-lg header-transparent bg-transparent disable-fixed @endif">
        <div class="container-fluid">
            <div class="col-auto col-xxl-3 col-lg-2 me-lg-0 me-auto">
                <a class="navbar-brand" href="{{ route('site.home') }}">
                    <img src="{{ asset('assets/images/zibon-logo.svg') }}"
                        data-at2x="{{ asset('assets/images/zibon-logo.svg') }}" alt="" class="default-logo">
                    <img src="{{ asset('assets/images/zibon-logo.svg') }}"
                        data-at2x="{{ asset('assets/images/zibon-logo.svg') }}" alt="" class="alt-logo">
                    <img src="{{ asset('assets/images/zibon-logo.svg') }}"
                        data-at2x="{{ asset('assets/images/zibon-logo.svg') }}" alt="" class="mobile-logo">
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
                    <div class="d-block d-md-none navbar-header text-right" style="padding-left:15px ">
                        <a href="{{ route('site.home') }}" class="menu-header-logo"><img
                                src="{{ asset('assets/images/zibon-logo.svg') }}"
                                data-at2x="{{ asset('assets/images/zibon-logo.svg') }}" class="text-center"
                                style="max-height:100px;" alt=""></a>
                        <div class="header-icon d-flex flex-column align-items-start">
                            <div class="d-xxl-inline-block mt-15px">
                                <a href="https://wa.me/+917046241444" class="widget-text text-dark text-dark-hover fs-17">
                                    <i class="bi bi-whatsapp me-10px"></i> For Export
                                </a>
                            </div>
                            <div class="d-xxl-inline-block mt-15px">
                                <a href="https://wa.me/+919727763110" class="widget-text text-dark text-dark-hover fs-17">
                                    <i class="bi bi-whatsapp me-10px"></i> For Domestic
                                </a>
                            </div>
                            {{-- <div class="header-button my-2"><a href="{{ route('site.contact') }}"
                                    class="btn btn-very-small border-1 btn-transparent-white-light btn-round-edge">Let's
                                    talk</a></div> --}}
                            {{-- <div class="header-button dropdown dropdown-with-icon-style02 ">

                                        <button
                                            class="btn btn-very-small border-1 btn-transparent-white-light btn-round-edge dropdown-toggle"
                                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Let's talk
                                        </button>
                                        <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
                                            <li class="px-2 py-1"><a href="tel:"><i class="bi bi-telephone-fill"></i> For Export</a></li>
                                            <li class="px-2 pb-1"><a href="tel:"><i class="bi bi-telephone-fill"></i> For Domestic</a></li>
                
                                        </ul>
                                    </div> --}}
                        </div>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->routeIs('site.home') ? 'active' : '' }}"><a
                                href="{{ route('site.home') }}" class="nav-link">Home</a></li>
                        <li class="nav-item {{ request()->routeIs('site.about') ? 'active' : '' }}"><a
                                href="{{ route('site.about') }}" class="nav-link">Profile</a></li>
                        <li
                            class="nav-item {{ request()->routeIs('site.category') || request()->routeIs('site.product') ? 'active' : '' }}">
                            <a href="{{ route('site.product') }}" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('site.catalogue') ? 'active' : '' }}"><a
                                href="{{ route('site.catalogue') }}" class="nav-link">Downloads</a></li>
                        <li class="nav-item {{ request()->routeIs('site.product_information') ? 'active' : '' }}"><a
                                href="{{ route('site.product_information') }}" class="nav-link">Information</a></li>
                        <li class="nav-item {{ request()->routeIs('site.contact') ? 'active' : '' }}"><a
                                href="{{ route('site.contact') }}" class="nav-link">Contact</a></li>
                        <li class="nav-item">
                            <div id="google_translate_element" class="nav-link" style="width: min-content"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col text-end d-none d-sm-flex justify-content-end">
                <div class="header-icon">
                    {{-- <div class="d-none d-xxl-inline-block me-25px lg-me-0"><a href="tel:1800222000"
                            class="widget-text text-white-gray-hover fs-17"><i
                                class="feather icon-feather-phone-call me-10px"></i>+91 98798 44510</a></div> --}}
                    {{-- <div class="header-button px-1" style="margin-top:31px ">
                        <div id="google_translate_element" class="" style="width: min-content"></div>
                    </div> --}}
                    <div class="header-button dropdown dropdown-with-icon-style02 ">
                        
                        <button
                            class="btn btn-very-small border-1 btn-transparent-white-light btn-round-edge dropdown-toggle"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Let's talk
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right  p-0 bg-dark bg-opacity-50 border"
                            aria-labelledby="navbarDropdownMenuLink">
                            <li class="px-2 text-white py-1 border-bottom "><a
                                    href="https://wa.me/+917046241444" class="text-white"><i
                                        class="feather icon-feather-phone-call me-10px"></i> For Export</a>
                            </li>
                            <li class="px-2 text-white py-1">
                                <a href="https://wa.me/+919727763110" class="text-white"><i
                                        class="feather icon-feather-phone-call me-10px"></i> For
                                    Domestic</a></li>

                        </ul>
                    </div>

                    {{-- <div class="header-button">
                        <a href="{{ route('site.contact') }}"
                            class="btn btn-very-small border-1 btn-transparent-white-light btn-round-edge">Let's
                            talk</a></div> --}}
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<!-- end header -->
