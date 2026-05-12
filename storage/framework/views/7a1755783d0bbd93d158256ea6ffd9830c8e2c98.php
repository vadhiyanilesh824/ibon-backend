<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('Products')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('breadcrumb'); ?>
        <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['breadcrumbs' => @[['title' => __('Products'), 'url' => '#']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Breadcrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280)): ?>
<?php $component = $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280; ?>
<?php unset($__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            
                            
                            <a href="<?php echo e(route('products.add')); ?>"
                                class="btn btn-primary btn-xs float-right"><?php echo e(__('Add')); ?></a>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="datatable_with_buttons table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Image')); ?></th>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Category')); ?></th>
                                        <th><?php echo e(__('Brand')); ?></th>
                                        <th><?php echo e(__('Is Featured')); ?></th>
                                        <th><?php echo e(__('Is Trends')); ?></th>
                                        <th><?php echo e(__('Is Popular')); ?></th>
                                        <th><?php echo e(__('Is New')); ?></th>
                                        <th class="text-right"><?php echo e(__('Options')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="row gutters-5 w-200px w-md-300px mw-100">
                                                    <div class="col-auto">
                                                        <img src="<?php echo e(\App\Services\Helpers::uploaded_asset($product->thumbnail_img)); ?>"
                                                            alt="Image" class="h-50px">
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <?php echo e($product->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($product->category->name); ?>

                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="is_featured" id="customSwitch1<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>" onchange="change_section(this)"
                                                        <?php echo e($product->is_featured == 1 ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="customSwitch1<?php echo e($product->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_trends"
                                                        id="customSwitch2<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>" onchange="change_section(this)"
                                                        <?php echo e($product->is_trends == 1 ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="customSwitch2<?php echo e($product->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="is_popular" id="customSwitch3<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>" onchange="change_section(this)"
                                                        <?php echo e($product->is_popular == 1 ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="customSwitch3<?php echo e($product->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_new"
                                                        id="customSwitch4<?php echo e($product->id); ?>"
                                                        data-id="<?php echo e($product->id); ?>" onchange="change_section(this)"
                                                        <?php echo e($product->is_new == 1 ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="customSwitch4<?php echo e($product->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <?php if (isset($component)) { $__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3 = $component; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['actions' => @[
                                                    [
                                                        'title' => __('view'),
                                                        'link' => route('site.product_detail', $product->slug),
                                                    ],
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('products.edit', $product->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('products.destroy', $product->id),
                                                        'post' => true,
                                                    ],
                                                ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ActionButtons::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3)): ?>
<?php $component = $__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3; ?>
<?php unset($__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->startSection('js'); ?>
        <script>
            function change_section(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "<?php echo e(route('products.change_section')); ?>",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 1,
                        },
                        success: function(data) {
                            if(data.success == 0){
                                $(event).removeAttr("checked");
                            }
                        }
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "<?php echo e(route('products.change_section')); ?>",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 0,
                        },
                        success: function(data) {
                            if(data.success == 0){
                                $(event).attr("checked","checked");
                            }
                        }
                    });
                }
            }
        </script>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/product/products/index.blade.php ENDPATH**/ ?>