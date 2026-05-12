<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
          <?php echo csrf_field(); ?>

          <a  class="nav-link" href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              <?php echo e(__('Log Out')); ?>

          </a>
      </form>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <?php echo e(Auth::user()->name); ?>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"><?php echo e(Auth::user()->name); ?></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?php echo e(__("Profile")); ?>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> <?php echo e(__("Change Password")); ?>

          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
  
            <a  class="dropdown-item" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <i class="fas fa-sign-out fa mr-2"></i> <?php echo e(__('Log Out')); ?>

            </a>
        </form>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar --><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/admin_template/navbar.blade.php ENDPATH**/ ?>