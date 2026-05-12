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
                                        <th><?php echo e(__('Show in Home')); ?></th>
                                        <th class="text-right"><?php echo e(__('Options')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $catalogue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($cat->title); ?></td>
                                            <td>
                                                <img src="<?php echo e(\App\Services\Helpers::uploaded_asset($cat->image)); ?>"
                                                    alt="<?php echo e(__('Slide')); ?>" class="h-50px">
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_home"
                                                        id="customSwitch4<?php echo e($cat->id); ?>"
                                                        data-id="<?php echo e($cat->id); ?>" onchange="change_section(this)"
                                                        <?php echo e($cat->is_home == 1 ? 'checked' : ''); ?>>
                                                    <label class="custom-control-label"
                                                        for="customSwitch4<?php echo e($cat->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <?php if (isset($component)) { $__componentOriginal9122082f2e8d9979adb08bb3a61cf70a6ba442e3 = $component; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['actions' => @[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('catalogue.edit', $cat->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('catalogue.destroy', $cat->id),
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
                            <h5 class="mb-0 h6"><?php echo e(__('Add New Catalogue')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('catalogue.save')); ?>" method="POST">
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
                                <div class="form-group mb-3">
                                    <label for="pdf"><?php echo e(__('PDF')); ?></label>
                                    <div class="input-group" data-toggle="dsjuploader" data-type="document">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                <?php echo e(__('Browse')); ?></div>
                                        </div>
                                        <div class="form-control file-amount"><?php echo e(__('Choose File')); ?></div>
                                        <input type="hidden" name="pdf" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pdf_url"><?php echo e(__('Pdf Url')); ?></label>
                                    <input type="text" placeholder="<?php echo e(__('Pdf Url')); ?>" name="pdf_url"
                                        class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><?php echo e(__('Category')); ?></label>

                                    <select class="form-control select2" name="category_id" required>
                                        <option value=""><?php echo e(__('Select Category')); ?></option>
                                        
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $__env->make('backend.product.category.child_category', [
                                                    'child_category' => $childCategory,
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="col-from-label"><?php echo e(__('Description')); ?> <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control summernote" id="summernote" cols="30" rows="5"></textarea>
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
        <script>
            function change_section(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "<?php echo e(route('catalogue.change_section')); ?>",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 1,
                        },
                        success: function(data) {
                            if (data.success == 0) {
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
                        url: "<?php echo e(route('catalogue.change_section')); ?>",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 0,
                        },
                        success: function(data) {
                            if (data.success == 0) {
                                $(event).attr("checked", "checked");
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
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/catalogue/index.blade.php ENDPATH**/ ?>