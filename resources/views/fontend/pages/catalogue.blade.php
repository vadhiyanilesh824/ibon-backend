@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor" id="small"
        style="background-image: url({{ asset('assets/images/image/catalogue-2.png') }});">
        <div class="container">
            <div class="row extra-very-small-screen row-a pt-10 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px text-white text-shadow-medium "><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>Our
                        Collection</h1>
                    <h3 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">Catalogue</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    @foreach (\App\Models\Category::where('parent_id', 0)->orderByDesc('id')->get() as $main_category)
        @php
            $mcat_id = '-' . $main_category->id . '-';
        @endphp
        @if (
            $catalogue->filter(function ($f) use ($mcat_id) {
                    return strpos($f->cat_ids, $mcat_id) !== false ? 1 : 0;
                })->count() > 0)
            <section class="pb-0">
                <div class="container">
                    <div class="row justify-content-center row-a mb-5 appear " data-aoss="slide-up" data-aos-duration="800"
                        data-aos-delay="0">
                        <div class="col-xl-5 col-md-7 col-lg-6 col-sm-8 text-center appear">
                            <h3 class="text-dark-gray fw-700 ls-minus-1px" data-aoss="slide-up"data-aos-duration="800"
                                data-aos-delay="0">{{ $main_category->name }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center tab-style-08">
                            <ul
                                class="portfolio-filter portfolio_filter_navigation nav nav-tabs justify-content-center border-0 text-uppercase fs-14 fw-500 mb-4">
                                <li class="nav active"><a class="portfolio_all_click fs-20 pb-5px" data-filter=".cat{{ $main_category->id }}" href="#">All</a>
                                </li>
                                @foreach ($main_category->categories as $key => $category)
                                    @php
                                        $cat_id = '-' . $category->id . '-';
                                    @endphp
                                    @if (
                                        $catalogue->filter(function ($f) use ($cat_id) {
                                                return strpos($f->cat_ids, $cat_id) !== false ? 1 : 0;
                                            })->count() > 0)
                                        <li class="nav"><a class="fs-20 pb-5px" data-filter=".cat{{ $category->id }}"
                                                href="#">{{ $category->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 filter-content">
                            <ul
                                class="portfolio-creative portfolio-wrapper grid-loading grid-loading-white grid grid-3col xxl-grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                                <li class="grid-sizer"></li>
                                @php
                                    $cat_id = '-' . $main_category->id . '-';
                                @endphp
                                @if (
                                    $catalogue->filter(function ($f) use ($cat_id) {
                                            return strpos($f->cat_ids, $cat_id) !== false ? 1 : 0;
                                        })->count() > 0)
                                    @foreach ($catalogue->filter(function ($f) use ($cat_id) {
            return strpos($f->cat_ids, $cat_id) !== false ? 1 : 0;
        }) as $ctlg)
                                        @php
                                            $cat_classes = str_replace('-', ' cat', $ctlg->cat_ids);
                                        @endphp
                                        <li
                                            class="grid-item cat{{ $main_category->id }} {{ $cat_classes }} transition-inner-all">
                                            <div class="col text-center team-style-01 mb-30px">
                                                <figure class="mb-0 hover-box box-hover position-relative"
                                                    style="padding-bottom: 86px;">
                                                    <img src="{{ \App\Services\Helpers::uploaded_asset($ctlg->image) }}"
                                                        alt="" class="border-radius-6px appear anime-complete"
                                                        style="aspect-ratio:3/2;object-fit:cover">

                                                    <figcaption class="w-100 p-10px lg-p-25px bg-white">
                                                        <a href="{{ $ctlg->pdf != null ? \App\Services\Helpers::uploaded_asset($ctlg->pdf) : $ctlg->pdf_url }}"
                                                            class="btn btn-very-small btn-rounded with-rounded btn-white btn-box-shadow fw-600 box-shadow-large d-flex align-items-center "
                                                            style="position: absolute;right:5px;top: -42px;">
                                                            Download
                                                            <span class="bg-base-color text-white">
                                                                <i class="fa-solid fa-download"></i>
                                                            </span>
                                                        </a>
                                                        <div
                                                            class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                                            <span
                                                                class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">{{ $ctlg->title }}</span>
                                                            {!! $ctlg->category->id == $ctlg->main_category->id
                                                                ? $ctlg->category->name
                                                                : $ctlg->category->name . ' <strong>|</strong> ' . $ctlg->main_category->name !!}
                                                        </div>
                                                        <div
                                                            class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px">
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    
@endsection
@section('js')
    <script>
        // document ready function
        $(document).ready(function() {
            $('.portfolio_all_click').trigger('click');
        });

    </script>
@endsection