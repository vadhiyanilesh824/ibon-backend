<header id="home">

    <!-- Start Navigation -->
    <!-- navbar-transparent -->
    <nav class="navbar navbar-default active-border navbar-fixed white bootsnav">

        <div class="container-fluid">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav button theme">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-play"></i> GET APP</a>
                    </li>
                    <li>
                        <a href="tel:{{ site_settings('customer_care', false) }}"><i class="fa fa-headphones"></i>Customer Care</a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('site.home') }}">
                    <img src="{{ asset('assets/img/rutva-tiles-logo-2.png') }}" class="logo logo-display" alt="Logo">
                    <img src="{{ asset('assets/img/rutva-tiles-logo-2.png') }}" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">

                    <li>
                        <a class="smooth-menu" href="{{ route('site.home') }}">home </a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ route('site.company') }}">Profile</a>
                    </li>
                    <li class="dropdown dropdown-right megamenu-fw">
                        <a href="#home" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Products</a>
                        <div class="megamenu-content dropdown-menu">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-danger">Categories</h4>
                                    @php
                                    $category = \App\Models\Category::where('level', 0)->orderBy('order_level', 'DESC')->get();
                                    $count = $category->count();
                                    @endphp
                                    <ul>
                                        @foreach ($category as $key => $cat)
                                        <li class="{{ url()->current() == route('site.product', $cat->slug) ? 'active' : '' }}">
                                            <a href="{{ route('site.product', $cat->slug) }}">
                                                {{ $cat->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @foreach (\App\Models\Attribute::where('is_show_in_list',1)->get() as $a)
                                <div class="col-md-6">
                                    <h4 class="text-danger">{{ $a->name }}</h4>
                                    <ul class="">
                                        @foreach($a->attribute_values as $key => $av)
                                        <li class="">
                                            <a href="{{route('site.product').'?selected_attribute_values%5B'.$a->id.'%5D%5B%5D='.$av->value}}">
                                                {{ $av->value }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ route('site.catalogue') }}">Catalogue</a>
                    </li>
                    <li class="dropdown dropdown-right">
                        <a href="#home" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Information</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('site.export') }}">Packing</a></li>
                            <li><a href="{{ route('site.product_quality') }}">Quality</a></li>
                            <li><a href="{{ route('site.technical_specification') }}">Technical Details</a></li>
                            <li><a href="{{ route('dealers') }}">Showrooms / Stores</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ route('site.news') }}">News</a>
                    </li>

                    <li>
                        <a class="smooth-menu" href="{{ route('site.contact') }}">contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
