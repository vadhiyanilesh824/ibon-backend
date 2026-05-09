@extends('fontend.layouts.app')
@section('title', 'We Garnish The Architect')
@section('content')
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor"
        style="background-image: url({{ $innet_titles['img'] ?? asset('assets/images/image/product-1.png') }})">
        <div class="container">
            <div class="row extra-very-small-screen align-items-center pt-10 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px xs-mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>{{ $innet_titles['subtitle'] ?? 'Our Products' }}
                    </h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">
                        {{ $innet_titles['title'] ?? 'Our Products' }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 tab-style-04">
                    <ul
                        class="blog-classic blog-wrapper grid grid-3col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-1col xs-grid-1col gutter-extra-large">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        @foreach ($products as $product)
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="{{ route('site.product_detail', $product->slug) }}">
                                            <img src="{{ \App\Services\Helpers::uploaded_asset($product->thumbnail_img) }}"
                                                alt=""  style="aspect-ratio:3/2 !important;object-fit:contain;object-position: center;"/>
                                        </a>
                                    </div>
                                    <div
                                        class="card-body text-center px-0 pt-10px pb-30px xs-pb-15px last-paragraph-no-margin">
                                        <a href="{{ route('site.product_detail', $product->slug) }}"
                                            class="card-title mb-5px fw-500 lh-30 text-dark-gray d-block">{{ $product->name }}
                                            <p class="text-muted">{{ $product->category->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                        @endforeach
                    </ul>
                    <div class="row m-0 pt-5">
                        <div class="col-12 mt-3 d-flex justify-content-center appear anime-complete"
                            data-anime="{ &quot;translateY&quot;: [0, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 1200, &quot;delay&quot;: 0, &quot;staggervalue&quot;: 150, &quot;easing&quot;: &quot;easeOutQuad&quot; }">
                            @if ($products->lastPage() > 1)
                                @php
                                    $currentQuery = app('request')->query();
                                    unset($currentQuery['page']);
                                @endphp
                                <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
                                    <li class="page-item  {{ $products->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link " {{ $products->currentPage() == 1 ? ' disabled' : '' }}
                                            href="{{ $products->url(1) . '&' . http_build_query($currentQuery) }}"><span
                                                aria-hidden="true"><i
                                                    class='feather icon-feather-arrow-left fs-18 d-xs-none'></i></span></a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <?php
                                        $half_total_links = floor($products->lastPage() + 1 / 2);
                                        $from = $products->currentPage() - $half_total_links;
                                        $to = $products->currentPage() + $half_total_links;
                                        if ($products->currentPage() < $half_total_links) {
                                            $to += $half_total_links - $products->currentPage();
                                        }
                                        if ($products->lastPage() - $products->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($products->lastPage() - $products->currentPage()) - 1;
                                        }
                                        ?>
                                        @if ($from < $i && $i < $to)
                                            <li class="page-item  {{ $products->currentPage() == $i ? ' active' : '' }}">
                                                <a class="page-link  {{ $products->currentPage() == $i ? '' : '' }}"
                                                    href="{{ $products->url($i) . '&' . http_build_query($currentQuery) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li
                                        class="page-item  {{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link  {{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}"
                                            href="{{ $products->url($products->lastPage()) . '&' . http_build_query($currentQuery) }}"><span
                                                aria-hidden="true"><i
                                                    class='feather icon-feather-arrow-right fs-18 d-xs-none'></i></span></a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-25px">
                    <div class="accordion accordion-style-02-01 mb-25px xs-mb-15px" id="accordion-style-02"
                        data-active-icon="icon-feather-minus" data-inactive-icon="icon-feather-plus">
                        <!-- start accordion item -->
                        <div class="accordion-item active-accordion">
                            <div
                                class="accordion-header border-bottom border-color-transparent-white-light bg-gradient-blue-ironstone-brown p-4 bg-theme-color">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-01"
                                    aria-expanded="true" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-white">
                                        <i class="feather icon-feather-minus"></i><span
                                            class="fw-500 fs-19">Colllection</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-01" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-white-light">
                                    <ul class="list p-0">
                                        @foreach (\App\Models\Category::where('level', 0)->with('childrenCategories')->get() as $k => $cat)
                                            @php
                                                $trxt = "'show_hide_collapse_" . $cat->id . "'";

                                            @endphp
                                            <li
                                                class="{{ $cat->childrenCategories->count() > 0 ? '' : 'last' }} {{ $slug == $cat->slug ? 'active fw-900 text-base-color' : '' }}">
                                                <i class='fa fa-angle-right'
                                                    onclick="show_hide_collapse({{ $trxt }},this)"></i> <a
                                                    href="{{ route('site.product', $cat->slug) }}"
                                                    class="inherited-a {{ $slug == $cat->slug ? 'active fw-900 text-base-color' : '' }} uppercase">
                                                    &nbsp; {{ $cat->name }}</a>
                                            </li>
                                            {!! get_children_category_menu($cat, $slug) !!}
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header bg-gradient-blue-ironstone-brown p-4 bg-theme-color">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-02"
                                    aria-expanded="{{ !empty($selected_attribute_values) ? 'true' : 'false' }}"
                                    data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-white">
                                        <i
                                            class="feather icon-feather-{{ !empty($selected_attribute_values) ? 'minus' : 'plus' }}"></i><span
                                            class="fw-500 fs-19">Filters</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-02"
                                class="accordion-collapse collapse  {{ !empty($selected_attribute_values) ? 'show' : '' }}"
                                data-bs-parent="#accordion-style-02">
                                <div class="accordion-body last-paragraph-no-margin">
                                    <form class="" id="search-form" action="" method="GET">

                                        @foreach ($attributes as $key => $attribute)
                                            @if ($attribute->attribute_values->count() > 0)
                                                <strong>{{ $attribute->name }}</strong>
                                                <ul class="list">
                                                    @foreach ($attribute->attribute_values as $key2 => $attribute_value)
                                                        <li
                                                            class="@if (in_array($attribute_value->value, $selected_attribute_values[$key] ?? [])) fw-900 text-base-color @endif change_form">
                                                            <input type="checkbox"
                                                                name="selected_attribute_values[{{ $key }}][]"
                                                                value="{{ $attribute_value->value }}" hidden
                                                                id="selected_attribute_values_{{ $key }}_{{ $key2 }}"
                                                                @if (in_array($attribute_value->value, $selected_attribute_values[$key] ?? [])) checked @endif
                                                                onchange="filter()" /> <label
                                                                for="selected_attribute_values_{{ $key }}_{{ $key2 }}">{{ $attribute_value->value }}</label></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('js')
    <script type="text/javascript">
        function filter() {
            $('#search-form').submit();
        }

        function show_hide_collapse(c, e) {
            if ($('.' + c + '_list').hasClass('d-none')) {
                $('.' + c + '_list').removeClass('d-none');
                $(e).removeClass('fa-angle-right');
                $(e).addClass('fa-angle-down');
            } else {
                $('.' + c + '_list').addClass('d-none');
                $(e).addClass('fa-angle-right');
                $(e).removeClass('fa-angle-down');
            }
        }
    </script>
@endsection
