<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="IBON." />
    <!-- Meta -->
    @php
        if (!isset($meta)) {
            $meta = \App\Models\Page::where('page_route', \Request::route()->getName())->first();
            if (!$meta) {
                $meta = \App\Models\Page::where('page_route', 'site.home')->first();
            }
        }
    @endphp
    <title>{{ $meta['meta_title'] ?? (site_settings('company_name', false) ?? config('app.name')) }}</title>
    <meta name="keywords" content="{{ $meta['meta_keys'] ?? config('app.name') }}" />
    <meta name="description" content="{{ $meta['meta_description'] ?? config('app.name') }}" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta property="og:url" content="{{ \Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="{{ isset($meta['meta_title']) && $meta['meta_title'] != '' ? $meta['meta_title'] : '' }}" />
    <meta property="og:description"
        content="{{ isset($meta['meta_description']) && $meta['meta_description'] != '' ? $meta['meta_description'] : '' }}" />
    <meta property="og:image"
        content="{{ isset($meta['meta_image']) && $meta['meta_image'] != '' ? \App\Services\Helpers::uploaded_asset($meta['meta_image']) : '' }}" />
    <!-- favicon icon -->
    @include('fontend.include.head')
    @yield('css')
</head>
@php
    $main_categories = \App\Models\Category::where('parent_id',0)->get();
@endphp
<body data-mobile-nav-style="classic" class="custom-cursor">
    <!-- start cursor -->
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>
    <!-- end cursor -->
    
    <!-- start header -->

    @include('fontend.include.header',['main_categories'=>$main_categories])

    @yield('content')

    @include('fontend.include.footer')

    @yield('modals')

    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendors.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/aos.js')}}"></script>
    <script>
        AOS.init();
    </script>

    @yield('js')


</body>

</html>
