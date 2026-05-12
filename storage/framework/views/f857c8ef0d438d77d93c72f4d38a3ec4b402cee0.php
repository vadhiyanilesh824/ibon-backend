<?php
    $value = null;
    for ($i=0; $i < $child_category->level; $i++){
        $value .= '--';
    }
?>
<option value="<?php echo e($child_category->id); ?>" <?php if(isset($category) && $category->parent_id == $child_category->id): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($value." ".$child_category->name); ?></option>
<?php if($child_category->categories): ?>
    <?php $__currentLoopData = $child_category->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('backend.product.category.child_category', ['child_category' => $childCategory, 'category' => (isset($category) ? $category : NULL )], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/product/category/child_category.blade.php ENDPATH**/ ?>