<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/fontawesome-free/css/all.min.css')); ?>">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('theme/admin/css/adminlte.min.css')); ?>">
    </head>
    <body  class="hold-transition login-page">
        <?php echo e($slot); ?>

       
        <!-- jQuery -->
        <script src="<?php echo e(asset('theme/admin/plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('theme/admin/js/adminlte.min.js')); ?>"></script>

    </body>
</html>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/layouts/guest.blade.php ENDPATH**/ ?>