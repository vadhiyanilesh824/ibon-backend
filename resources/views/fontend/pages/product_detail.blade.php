@extends('fontend.layouts.app')
@section('title', 'We Garnish The Architect')
@section('content')
    @php
        $i = explode(',', $product->previews);
        $j = explode(',', $product->photos);
        $img_set = $i[0];
        if ($img_set == '' || $img_set == null) {
            $img_set = $j[0];
        }
        $j = array_unique(array_merge($i, $j));
    @endphp
    <!-- start page title -->
    <section class="top-space-margin page-title-big-typography cover-background magic-cursor round-cursor"
        style="background-image: url({{ \App\Services\Helpers::uploaded_asset($j[0] ?? 0) ?? asset('assets/images/image/product-1.png') }})">
        <div class="container">
            <div class="row extra-very-small-screen align-items-center pt-10 md-pt-20">
                <div class="col-lg-5 col-sm-8 position-relative page-title-extra-small"
                    data-anime='{ "el": "childs", "opacity": [0, 1], "translateX": [-30, 0], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h1 class="mb-20px xs-mb-20px text-white text-shadow-medium"><span
                            class="w-30px h-2px bg-yellow d-inline-block align-middle position-relative top-minus-2px me-10px"></span>{{ $product->category->name }}
                    </h1>
                    <h2 class="text-white text-shadow-medium fw-500 ls-minus-2px mb-0">{{ $product->name }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <section class="p-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-6 md-mb-40px appear anime-complete"
                    data-anime="{ &quot;translate&quot;: [0, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;: 100, &quot;staggervalue&quot;: 150, &quot;easing&quot;: &quot;easeOutQuad&quot; }"
                    style="translate: 0px;">
                    <div class="row overflow-hidden position-relative">
                        <div class="col-12 position-relative product-image">
                            <div class="swiper product-image-slider swiper-initialized swiper-horizontal swiper-backface-hidden"
                                data-slider-options="{ &quot;spaceBetween&quot;: 0, &quot;watchOverflow&quot;: true, &quot;navigation&quot;: { &quot;nextEl&quot;: &quot;.slider-product-next&quot;, &quot;prevEl&quot;: &quot;.slider-product-prev&quot; }, &quot;thumbs&quot;: { &quot;swiper&quot;: { &quot;el&quot;: &quot;.product-image-thumb&quot;, &quot;slidesPerView&quot;: &quot;5&quot;, &quot;spaceBetween&quot;: 15 } } }"
                                data-swiper-thumb-click="1">
                                <div class="swiper-wrapper" id="swiper-wrapper-6ea75c53edc4b7c6" aria-live="polite">
                                    @foreach ($j as $key => $is)
                                        <div class="swiper-slide gallery-box" style="width: 580px;" role="group"
                                            aria-label="{{ $key + 1 }} / {{ count($j) }}">
                                            <a href="{{ \App\Services\Helpers::uploaded_asset($is) }}"
                                                data-group="lightbox-gallery" title="Minimalist wooden chair">
                                                <img class="w-100" src="{{ \App\Services\Helpers::uploaded_asset($is) }}"
                                                    alt="{{ $product->name }}" data-no-retina="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <div class="slider-product-next swiper-button-next border-radius-100 border border-1 border-color-extra-medium-gray swiper-button-disabled"
                                tabindex="-1" role="button" aria-label="Next slide"
                                aria-controls="swiper-wrapper-6ea75c53edc4b7c6" aria-disabled="true"><i
                                    class="fa fa-chevron-right text-dark-gray icon-very-small"></i></div>
                            <div class="slider-product-prev swiper-button-prev border-radius-100 border border-1 border-color-extra-medium-gray"
                                tabindex="0" role="button" aria-label="Previous slide"
                                aria-controls="swiper-wrapper-6ea75c53edc4b7c6" aria-disabled="false"><i
                                    class="fa fa-chevron-left text-dark-gray icon-very-small"></i></div>
                        </div>
                        <div class="col-12 position-relative mt-5">
                            <div
                                class="swiper-container product-image-thumb swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                                <div class="swiper-wrapper" id="swiper-wrapper-fb7e52f95ea19af2" aria-live="polite">
                                    @foreach ($j as $key => $is)
                                        <div class="swiper-slide" style="width: 104px; margin-right: 15px;" role="group"
                                        aria-label="{{ $key + 1 }} / {{ count($j) }}"><img class="w-100"
                                            src="{{ \App\Services\Helpers::uploaded_asset($is) }}" alt=""
                                            data-no-retina=""></div>
                                    @endforeach

                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 product-info appear anime-complete"
                    data-anime="{ &quot;translate&quot;: [0, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;: 100, &quot;staggervalue&quot;: 150, &quot;easing&quot;: &quot;easeOutQuad&quot; }"
                    style="translate: 0px;">
                    <span class="fw-500 text-dark-gray d-block">IBON</span>
                    <h5 class="alt-font text-dark-gray fw-700 mb-10px">{{ $product->name }}</h5>
                    <div class="d-block d-sm-flex align-items-center mb-20px">
                    </div>
                    <table class="table">
                        @if (isset($product->brand->name))
                            <tr>
                                <td style="white-space: nowrap">Brand</td>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                        @endif
                        @if (isset($product->category->name))
                            <tr>
                                <td style="white-space: nowrap">Type</td>
                                <td>{!! get_parent_category_menu($product->category) !!}</td>
                            </tr>
                        @endif
                        @if (count(json_decode($product->choice_options)) > 0)
                            @foreach (json_decode($product->choice_options) as $s)
                                @php
                                    $c = \App\Models\Attribute::find($s->attribute_id);
                                @endphp
                                <tr>
                                    <td style="white-space: nowrap">{{ $c->name }}</td>
                                    <td>
                                        @foreach ($s->values as $key => $sss)
                                            {{ $key == 0 ? '' : ' | ' }} {{ $sss }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($product->category->attributes as $s)
                                @if (is_array(json_decode($s->pivot->attribute_value)))
                                    <tr>
                                        <td>{{ $s->name }}</td>
                                        <td>
                                            @foreach (json_decode($s->pivot->attribute_value) as $key => $sss)
                                                {{ $key == 0 ? '' : ' | ' }} {{ $sss }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </table>
                    <div class="row mb-20px">
                        <div class="col-auto icon-with-text-style-08">
                            <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                <div class="feature-box-icon me-10px">
                                    <i class="feather icon-feather-mail align-middle text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <a href="{{ route('site.contact', ['type' => 'product', 'type_id' => $product->id]) }}" class="alt-font fw-500 text-dark-gray d-block">Ask a question</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto icon-with-text-style-08">
                            <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                <div class="feature-box-icon me-10px">
                                    <i class="feather icon-feather-share-2 align-middle text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <a href="https://wa.me/{{ site_settings('phone', false) }}?text=Product%20Name%3A%20{{ $product->name }}%2C%20" class="alt-font fw-500 text-dark-gray d-block">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-20px h-1px w-100 bg-extra-medium-gray d-block"></div>
                    <div class="row mb-15px">
                        <div class="col-12 icon-with-text-style-08">
                            <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                <div class="feature-box-icon me-10px">
                                    <i
                                        class="feather icon-feather-truck top-8px position-relative align-middle text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span><span class="alt-font text-dark-gray fw-500">Delivery:</span>&nbsp;Indai</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                <div class="feature-box-icon me-10px">
                                    <i
                                        class="feather icon-feather-archive top-8px position-relative align-middle text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span><span class="alt-font text-dark-gray fw-500">Export shipping :</span>&nbsp;Mundra
                                        Port, Kandala Port</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
