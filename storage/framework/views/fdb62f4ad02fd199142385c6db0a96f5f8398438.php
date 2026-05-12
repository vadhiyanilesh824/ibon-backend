<?php echo $__env->make('admin.uploader.uploader-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('Site Settings')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form class="p-4" action="<?php echo e(route('site_settings.store')); ?>" method="POST"
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Company Information')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="company_name"><?php echo e(__('Company Name')); ?> </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Company Name')); ?>" id="company_name"
                                    name="company_name[text]" value="<?php echo e(site_settings('company_name', false)); ?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(__('Logo')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            <?php echo e(__('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(__('Choose File')); ?></div>
                                    <input type="hidden" name="logo[image]" value="<?php echo e(site_settings('logo', false)); ?>"
                                        class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="signinSrEmail"><?php echo e(__('Footer Logo')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            <?php echo e(__('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(__('Choose File')); ?></div>
                                    <input type="hidden" name="footer_logo[image]"
                                        value="<?php echo e(site_settings('footer_logo', false)); ?>" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(__('Icon Logo')); ?>

                                <small>(<?php echo e(__('100x100')); ?>)</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            <?php echo e(__('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(__('Choose File')); ?></div>
                                    <input type="hidden" name="meta_logo[image]"
                                        value="<?php echo e(site_settings('meta_logo', false)); ?>" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label"><?php echo e(__('Receive Emails')); ?></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="receive_email[text]"
                                    value="<?php echo e(site_settings('receive_email', false)); ?>"
                                    placeholder="<?php echo e(__('Receive Email Address')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label"><?php echo e(__('Phone No')); ?></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone[text]"
                                    value="<?php echo e(site_settings('phone', false)); ?>"
                                    placeholder="<?php echo e(__('Phone No')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label"><?php echo e(__('Customer Care')); ?></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="customer_care[text]"
                                    value="<?php echo e(site_settings('customer_care', false)); ?>"
                                    placeholder="<?php echo e(__('Customer Care')); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label"><?php echo e(__('Address')); ?></label>
                            <div class="col-sm-9">
                                <textarea name="address[text]" rows="3" class="form-control"><?php echo e(site_settings('address', false)); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Addresses')); ?></h3>
                        <a href="<?php echo e(route('address.create')); ?>"
                            class="btn btn-primary btn-xs float-right"><?php echo e(__('Add')); ?></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <strong><?php echo $a->name; ?></strong>
                                            </div>
                                            <div class="card-tools">
                                                <a href="<?php echo e(route('address.create',$a->id)); ?>" class="btn btn-tool">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if($a->is_main != 1): ?>
                                                <a class="btn btn-tool" href="<?php echo e(route('address.destroy',$a->id)); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                            <p class="text-muted"><?php echo $a->address; ?></p>
                                            <hr>
                                            <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>
                                            <p class="text-muted">
                                                <?php $__currentLoopData = json_decode($a->phone); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($phone); ?> <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                            <p class="text-muted">
                                                <?php $__currentLoopData = json_decode($a->email); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($email); ?> <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-phone mr-1"></i> Customer Care</strong>
                                            <p class="text-muted"><?php echo e($a->customer_care); ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="card-title custom-control custom-switch  float-right">
                                                <input type="checkbox" class="custom-control-input" 
                                                    id="is_main_address_<?php echo e($key); ?>" onchange="changeMainAddress(<?php echo e($a->id); ?>)" <?php echo e(($a->is_main==1)?'checked disabled':""); ?>>
                                                <label class="custom-control-label" for="is_main_address_<?php echo e($key); ?>">Main
                                                    Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Social Links')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="instagram_link"><?php echo e(__('Instagram')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Instagram')); ?>" id="instagram_link"
                                    name="instagram_link[text]" value="<?php echo e(site_settings('instagram_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="facebook_link"><?php echo e(__('Facebook')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Facebook')); ?>" id="facebook_link"
                                    name="facebook_link[text]" value="<?php echo e(site_settings('facebook_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="twitter_link"><?php echo e(__('Twitter')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Twitter')); ?>" id="twitter_link"
                                    name="twitter_link[text]" value="<?php echo e(site_settings('twitter_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="youtube_link"><?php echo e(__('Youtube')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Youtube')); ?>" id="youtube_link"
                                    name="youtube_link[text]" value="<?php echo e(site_settings('youtube_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="linkedin_link"><?php echo e(__('Linked In')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Linked In')); ?>" id="linkedin_link"
                                    name="linkedin_link[text]" value="<?php echo e(site_settings('linkedin_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="pinterest_link"><?php echo e(__('Pinterest')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Pinterest')); ?>" id="pinterest_link"
                                    name="pinterest_link[text]" value="<?php echo e(site_settings('pinterest_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="googleplus_link"><?php echo e(__('Google')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Google')); ?>" id="googleplus_link"
                                    name="googleplus_link[text]" value="<?php echo e(site_settings('googleplus_link', false)); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Google Map')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="google_map"><?php echo e(__('Google Map')); ?>

                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="<?php echo e(__('Google Map Embeded Link')); ?>"
                                    id="google_map" name="google_map[text]"
                                    value="<?php echo e(site_settings('google_map', false)); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </form>
    <?php $__env->startSection('js'); ?>
    <script>
        function changeMainAddress(id){
            location.href = '<?php echo e(url("admin/address/change_main_address")); ?>'+'/'+id;
        }
    </script>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/general_settings/index.blade.php ENDPATH**/ ?>