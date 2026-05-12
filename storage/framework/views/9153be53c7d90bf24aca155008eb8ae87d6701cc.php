<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['active']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['active']); ?>
<?php foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
$classes = ($is_active ?? false)
            ? 'nav-link active'
            : 'nav-link';
?>

<a  class="<?php echo e($classes); ?>" href="<?php echo e($url); ?>" >
    <?php echo e($slot); ?>

</a>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/components/sidebar-nav-link.blade.php ENDPATH**/ ?>