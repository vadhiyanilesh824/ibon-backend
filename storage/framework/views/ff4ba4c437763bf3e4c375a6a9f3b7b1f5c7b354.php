<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.uploader.uploader-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('Dealers')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('breadcrumb'); ?>
        <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['breadcrumbs' => @[['title' => __('Dealers'), 'url' => '#']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(route('dealer.add')); ?>"
                        class="btn btn-primary btn-xs float-right"><?php echo e(__('Add')); ?></a>
                </div>
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Company Name')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('Country')); ?></th>
                                <th><?php echo e(__('State')); ?></th>
                                <th><?php echo e(__('City')); ?></th>
                                <th class="text-right"><?php echo e(__('Options')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($i->company_name); ?></td>
                                    <td><?php echo e($i->name); ?></td>
                                    <td><?php echo e($i->email); ?></td>
                                    <td><?php echo e($i->phone); ?></td>
                                    <td><?php echo e($i->country); ?></td>
                                    <td><?php echo e($i->state); ?></td>
                                    <td><?php echo e($i->city); ?></td>
                                    <td class="text-right">
                                        <?php if (isset($component)) { $__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3 = $component; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['actions' => @[
                                            [
                                                'title' => __('Edit'),
                                                'link' => route('dealer.edit', $i->id),
                                            ],
                                            [
                                                'title' => __('Delete'),
                                                'link' => route('dealer.destroy', $i->id),
                                                'post'=>true
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
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/dealer/index.blade.php ENDPATH**/ ?>