<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('admin_template.theme.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('Blog')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('breadcrumb'); ?>
        <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['breadcrumbs' => @[['title'=>__('Blog'), 'url' => '#' ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                  
                  
                  <a href="<?php echo e(route('blog.add')); ?>" class="btn btn-primary btn-xs float-right"><?php echo e(__("Add")); ?></a>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Title')); ?></th>
                                <th data-breakpoints="lg"><?php echo e(__('Category')); ?></th>
                                <th data-breakpoints="lg"><?php echo e(__('Short Description')); ?></th>
                                <th data-breakpoints="lg"><?php echo e(__('Status')); ?></th>
                                
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e(($key+1) + ($blogs->currentPage() - 1) * $blogs->perPage()); ?>

                        </td>
                        <td>
                            <?php echo e($blog->title); ?>

                        </td>
                        <td>
                            <?php if($blog->category != null): ?>
                                <?php echo e($blog->category->category_name); ?>

                            <?php else: ?>
                                --
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($blog->short_description); ?>

                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="change_status(this)" value="<?php echo e($blog->id); ?>" <?php if($blog->status == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>
                            <td>
                              
                              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(__('Action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    
                                    <li>
                                      <a href="<?php echo e(route('blog.edit', $blog->id)); ?>" class="btn btn-link"><i class="dripicons-document-edit"></i> <?php echo e(__('Edit')); ?></a>
                                    </li>
                                    
                                    <li class="divider"></li>
                                    <form method="POST" action="<?php echo e(route('blog.destroy', $blog->id)); ?>">
                                      <?php echo csrf_field(); ?>
                                    <li>
                                        <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(__('Delete')); ?></button>
                                    </li>
                                    
                                    </form>
                                </ul>
                              </div>
                              
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/blog_system/blog/index.blade.php ENDPATH**/ ?>