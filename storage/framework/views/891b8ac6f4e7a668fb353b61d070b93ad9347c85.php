<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="IBON." />
    <!-- Meta -->
    <?php
        if (!isset($meta)) {
            $meta = \App\Models\Page::where('page_route', \Request::route()->getName())->first();
            if (!$meta) {
                $meta = \App\Models\Page::where('page_route', 'site.home')->first();
            }
        }
    ?>
    <title><?php echo e(site_settings('company_name', false) ?: ($meta['meta_title'] ?? config('app.name'))); ?></title>
    
    <meta name="keywords" content="<?php echo e($meta['meta_keys'] ?? config('app.name')); ?>" />
    <meta name="description" content="<?php echo e($meta['meta_description'] ?? config('app.name')); ?>" />
    <meta name="base-url" content="<?php echo e(url('/')); ?>">
    <meta property="og:url" content="<?php echo e(\Request::url()); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="<?php echo e(isset($meta['meta_title']) && $meta['meta_title'] != '' ? $meta['meta_title'] : ''); ?>" />
    <meta property="og:description"
        content="<?php echo e(isset($meta['meta_description']) && $meta['meta_description'] != '' ? $meta['meta_description'] : ''); ?>" />
    <meta property="og:image"
        content="<?php echo e(isset($meta['meta_image']) && $meta['meta_image'] != '' ? \App\Services\Helpers::uploaded_asset($meta['meta_image']) : ''); ?>" />
    <!-- favicon icon -->
    <?php echo $__env->make('fontend.include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<?php
    $main_categories = \App\Models\Category::where('parent_id',0)->get();
?>
<body data-mobile-nav-style="classic" class="custom-cursor">
    <!-- start cursor -->
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>
    <!-- end cursor -->
    
    <!-- start header -->

    <?php echo $__env->make('fontend.include.header',['main_categories'=>$main_categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('fontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('modals'); ?>

    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/vendors.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/aos.js')); ?>"></script>
    <script>
        AOS.init();
    </script>

    <?php echo $__env->yieldContent('js'); ?>


</body>

</html>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/fontend/layouts/app.blade.php ENDPATH**/ ?>