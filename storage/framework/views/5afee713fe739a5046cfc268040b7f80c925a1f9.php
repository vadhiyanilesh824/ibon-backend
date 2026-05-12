<?php if (! (count($breadcrumbs) == 0)): ?>
    <ol class="breadcrumb float-sm-right">

        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

 

            <?php if(!is_null($breadcrumb["url"]) && !$loop->last): ?>

                <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}"><?php echo e($breadcrumb["title"]); ?></a></li>

            <?php else: ?>

                <li class="breadcrumb-item active"><?php echo e($breadcrumb["title"]); ?></li>

            <?php endif; ?>

 

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ol>

<?php endif; ?><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>