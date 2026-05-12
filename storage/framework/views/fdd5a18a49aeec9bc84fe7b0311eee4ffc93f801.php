<div class="btn-group">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(__('Action')); ?>

        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($action["post"])): ?>
            <form method="POST" action="<?php echo e($action["link"]); ?>">
                <?php echo csrf_field(); ?>
              <li>
                  <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e($action["title"]); ?></button>
              </li>
              <li class="divider"></li>
              
              </form>
            <?php else: ?>
            <li>
            <a href="<?php echo e($action["link"]); ?>" class="btn btn-link"><i class="dripicons-document-edit"></i> <?php echo e($action["title"]); ?></a>
            </li>
            <?php endif; ?>
        <li class="divider"></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
    </ul>
  </div><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/components/action-buttons.blade.php ENDPATH**/ ?>