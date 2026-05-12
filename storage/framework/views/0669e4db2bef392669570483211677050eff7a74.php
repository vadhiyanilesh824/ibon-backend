<?php if(isset($message)): ?>
    <?php if($message != ""): ?>
        <?php if($type == 'error'): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i><?php echo e(__("Alert!")); ?></h5>
            <?php if(is_array($message)): ?>
                 <?php echo e(implode('',$message)); ?>

            <?php else: ?>
                <?php echo e($message); ?>

            <?php endif; ?>
        </div>
        <?php else: ?>
        <?php if($type == 'success'): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i><?php echo e(__("Alert!")); ?></h5>
            <?php echo e($message); ?>

        </div>
        <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php if(isset($message)): ?>
    <?php if($message != ""): ?>
        <?php if($type == 'alert' && $message->any()): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i><?php echo e(__("Alert!")); ?></h5>
           
                <?php echo e(implode('', $message->all(':message'))); ?>

          
        </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/components/alert.blade.php ENDPATH**/ ?>