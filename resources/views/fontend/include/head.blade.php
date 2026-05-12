<title>@hasSection('title')@yield('title') - @endif{{ site_settings('company_name') ?? 'ZIBON CERAMIC' }}</title>
<link rel="shortcut icon" href="{{ site_settings('logo') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ site_settings('logo') }}" sizes="180x180">
<link rel="apple-touch-icon" sizes="72x72" href="{{ site_settings('logo') }}" >
<link rel="apple-touch-icon" sizes="114x114" href="{{ site_settings('logo') }}" >
<!-- google fonts preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- style sheets and font icons  -->
<link rel="stylesheet" href="{{ asset('assets/css/vendors.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/icon.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/demos/accounting/accounting.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
{{-- //preload image --}}
<link rel="preload" href="{{ site_settings('logo') }}" as="image" />
<link rel="stylesheet" href="{{ asset('assets/css/custome.css') }}" />
<style>
    .portfolio_filter_navigation {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        overflow-x: auto;
        flex-wrap: nowrap;
    }

    .portfolio_filter_navigation li {
        display: inline-flex !important;
        width: auto;
        padding: 10px !important;
        white-space: nowrap;
    }
</style>
