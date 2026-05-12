<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/ds-app.js')); ?>"></script>
    <script>
        var DSJ = DSJ || {};
    </script>
    <script type="text/javascript">
        function detailsInfo(e) {
            $('#info-modal-content').html(
                '<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>'
                );
            var id = $(e).data('id')
            $('#info-modal').modal('show');
            $.post('<?php echo e(route('uploaded-files.info')); ?>', {
                _token: DSJ.data.csrf,
                id: id
            }, function(data) {
                $('#info-modal-content').html(data);
                // console.log(data);
            });
        }

        function copyUrl(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                DSJ.plugins.notify('success', '<?php echo e(__('Link copied to clipboard')); ?>');
            } catch (err) {
                DSJ.plugins.notify('danger', '<?php echo e(__('Oops, unable to copy')); ?>');
            }
            $temp.remove();
        }

        function sort_uploads(el) {
            $('#sort_uploads').submit();
        }
        $(".confirm-delete").click(function(e) {
            e.preventDefault();
            var url = $(this).data("href");
            $("#delete-modal").modal("show");
            $("#delete-link").attr("href", url);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve(['pageTitle' => ''.e(__('All uploaded files')).'','pageDescription' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">

                    <form id="sort_uploads" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="mb-0 h6"><?php echo e(__('All files')); ?></h5>
                            </div>
                            <div class="col-md-3 ml-auto mr-0">
                                <select class="form-control form-control-xs dsj-selectpicker" name="sort"
                                    onchange="sort_uploads()">
                                    <option value="newest" <?php if($sort_by == 'newest'): ?> selected="" <?php endif; ?>>
                                        <?php echo e(__('Sort by newest')); ?></option>
                                    <option value="oldest" <?php if($sort_by == 'oldest'): ?> selected="" <?php endif; ?>>
                                        <?php echo e(__('Sort by oldest')); ?></option>
                                    <option value="smallest" <?php if($sort_by == 'smallest'): ?> selected="" <?php endif; ?>>
                                        <?php echo e(__('Sort by smallest')); ?></option>
                                    <option value="largest" <?php if($sort_by == 'largest'): ?> selected="" <?php endif; ?>>
                                        <?php echo e(__('Sort by largest')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control form-control-xs" name="search"
                                    placeholder="<?php echo e(__('Search your files')); ?>" value="<?php echo e($search); ?>">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
                            </div>
                            <div class="col-auto">
                                <a href="<?php echo e(route('uploaded-files.create')); ?>"
                                    class="btn btn-primary pull-right float-right">
                                    <span><?php echo e(__('Upload New File')); ?></span>
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.card-header -->
                <div class="card-body">



                    <div>

                        <div>
                            <div class="row gutters-5">
                                <?php $__currentLoopData = $all_uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if ($file->file_original_name == null) {
                                            $file_name = __('Unknown');
                                        } else {
                                            $file_name = $file->file_original_name;
                                        }
                                    ?>
                                    <div class="col-auto w-140px w-lg-220px col-md-4 col-xs-2">
                                        <div class="dsj-file-box">
                                            <div class="dropdown-file">
                                                <a class="dropdown-link" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    
                                                    <a href="<?php echo e($file->file_name); ?>" target="_blank"
                                                        download="<?php echo e($file_name); ?>.<?php echo e($file->extension); ?>"
                                                        class="dropdown-item">
                                                        <i class="la la-download mr-2"></i>
                                                        <span><?php echo e(__('Download')); ?></span>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        onclick="copyUrl(this)" data-url="<?php echo e($file->file_name); ?>">
                                                        <i class="las la-clipboard mr-2"></i>
                                                        <span><?php echo e(__('Copy Link')); ?></span>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item confirm-delete"
                                                        data-href="<?php echo e(route('uploaded-files.destroy', $file->id)); ?>"
                                                        data-target="#delete-modal">
                                                        <i class="las la-trash mr-2"></i>
                                                        <span><?php echo e(__('Delete')); ?></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card card-file dsj-uploader-select c-default"
                                                title="<?php echo e($file_name); ?>.<?php echo e($file->extension); ?>">
                                                <div class="card-file-thumb">
                                                    <?php if($file->type == 'image'): ?>
                                                        <img src="<?php echo e(my_asset($file->file_name)); ?>"
                                                            class="img-fit img-responsive">
                                                    <?php elseif($file->type == 'video'): ?>
                                                        <i class="las la-file-video"></i>
                                                    <?php else: ?>
                                                        <i class="las la-file"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="d-flex">
                                                        <span class="text-truncate title"><?php echo e($file_name); ?></span>
                                                        <span class="ext">.<?php echo e($file->extension); ?></span>
                                                    </h6>
                                                    <p><?php echo e(formatBytes($file->file_size)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="dsj-pagination mt-3">
                                <?php echo e($all_uploads->appends(request()->input())->links()); ?>

                            </div>
                        </div>
                    </div>
                    <div id="delete-modal" class="modal fade">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title h6"><?php echo e(__('Delete Confirmation')); ?></h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p class="mt-1"><?php echo e(__('Are you sure to delete this file?')); ?></p>
                                    <button type="button" class="btn btn-link mt-2"
                                        data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                                    <a href="" class="btn btn-primary mt-2" id="delete-link"><?php echo e(__('Delete')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="info-modal" class="modal fade">
                        <div class="modal-dialog modal-dialog-right">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h6"><?php echo e(__('File Info')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
                                    <div class="c-preloader text-center absolute-center">
                                        <i class="las la-spinner la-spin la-3x opacity-70"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/backend/upload_files/index.blade.php ENDPATH**/ ?>