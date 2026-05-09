<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="app-url" content="{{ URL::to('/') }}">
<meta name="file-base-url" content="{{ config('app.uploaded_asset_url') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page_title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ds-skin.css') }}">
    @stack('css')
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        @include('admin_template/navbar')

        <!-- Header -->
        @include('admin_template/sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $page_title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            @yield('breadcrumb')

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <x-alert type="" message="" />
                    @include('flash::message')
                    <!-- Content -->
                    {{ $slot }}
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/admin/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
    @stack('js')
    @stack('script')
    @yield('js')
    @yield('script')

    <!-- AdminLTE App -->
    <script src="{{ asset('theme/admin/js/adminlte.min.js') }}"></script>
    <script>
        $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-dismissible").slideUp(500);
        });
    </script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>

</html>
