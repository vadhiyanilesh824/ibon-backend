<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="app-url" content="<?php echo e(URL::to('/')); ?>">
<meta name="file-base-url" content="<?php echo e(config('app.uploaded_asset_url')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($page_title); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/fontawesome-free/css/all.min.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('theme/admin/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/ds-skin.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        <?php echo $__env->make('admin_template/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Header -->
        <?php echo $__env->make('admin_template/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?php echo e($page_title); ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php echo $__env->yieldContent('breadcrumb'); ?>

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => '','message' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
                    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Content -->
                    <?php echo e($slot); ?>

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('theme/admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/admin/plugins/select2/js/select2.min.js')); ?>"></script>
    <script>
        $('.select2').select2();
    </script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldPushContent('script'); ?>
    <?php echo $__env->yieldContent('js'); ?>
    <?php echo $__env->yieldContent('script'); ?>

    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('theme/admin/js/adminlte.min.js')); ?>"></script>
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
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/admin_template/base.blade.php ENDPATH**/ ?>