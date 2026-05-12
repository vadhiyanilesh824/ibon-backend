<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.uploader.uploader-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('Slides')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('breadcrumb'); ?>
        <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['breadcrumbs' => @[['title' => __('Slider'), 'url' => '#']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <div class="col-7">
                    <div class="card">

                        <div class="card-body">
                            <table class="datatable_with_buttons table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('Title')); ?></th>
                                        <th><?php echo e(__('Image')); ?></th>
                                        <th class="text-right"><?php echo e(__('Options')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slides): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($slides->title); ?></td>
                                            <td>
                                                <img src="<?php echo e(\App\Services\Helpers::uploaded_asset($slides->image)); ?>"
                                                    alt="<?php echo e(__('Slide')); ?>" class="h-50px">
                                            </td>
                                            <td class="text-right">
                                                <?php if (isset($component)) { $__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3 = $component; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['actions' => @[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('slider.edit', $slides->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('slider.destroy', $slides->id),
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
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(__('Add New Slide')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('slider.save')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="title"><?php echo e(__('Title')); ?></label>
                                    <input type="text" placeholder="<?php echo e(__('title')); ?>" name="title"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name"><?php echo e(__('Image')); ?></label>
                                    <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                <?php echo e(__('Browse')); ?></div>
                                        </div>
                                        <div class="form-control file-amount"><?php echo e(__('Choose File')); ?></div>
                                        <input type="hidden" name="image" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-from-label"><?php echo e(__('Text Overlay')); ?> <span
                                            class="text-danger">(Html Code)*</span></label>
                                    <textarea name="slider_texts" class="form-control codeMirrorDemo" id="codeMirrorDemo" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group mb-3 text-right">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->startSection('js'); ?>
        <!-- CodeMirror -->
        <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/codemirror/codemirror.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('theme/admin/plugins/codemirror/theme/monokai.css')); ?>">
        <!-- CodeMirror -->
        <script src="<?php echo e(asset('theme/admin/plugins/codemirror/codemirror.js')); ?>"></script>
        <script src="<?php echo e(asset('theme/admin/plugins/codemirror/mode/css/css.js')); ?>"></script>
        <script src="<?php echo e(asset('theme/admin/plugins/codemirror/mode/xml/xml.js')); ?>"></script>
        <script src="<?php echo e(asset('theme/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
        <script>
            $(function() {

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })
        </script>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/slider/index.blade.php ENDPATH**/ ?>