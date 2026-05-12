<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/admin')); ?>" class="brand-link">
      <img src="<?php echo e(site_settings('logo',true)); ?>" alt="<?php echo e(site_settings('company_name',true)); ?>" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo e(site_settings('company_name',true)); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open-->
               <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('dashboard'),'active' => request()->routeIs('dashboard')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    <?php echo e(__("Dashboard")); ?>

                    <i class="right fas fa-angle-right"></i>
                  </p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
               </li>

               
          

          <li class="nav-item 
          <?php echo e(request()->routeIs('products')?'menu-open':''); ?> 
          <?php echo e(request()->routeIs('category')?'menu-open':''); ?> 
          <?php echo e(request()->routeIs('brands')?'menu-open':''); ?> 
          <?php echo e(request()->routeIs('attributes')?'menu-open':''); ?> 
          <?php echo e(request()->routeIs('colors')?'menu-open':''); ?>

          ">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['active' => (request()->routeIs('products')
              || request()->routeIs('category')
              || request()->routeIs('brands')
              || request()->routeIs('attributes')
              || request()->routeIs('colors'))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                <?php echo e(__("Products")); ?>

                <i class="right fas fa-angle-left"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('products'),'active' => request()->routeIs('products')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Products")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('category'),'active' => request()->routeIs('category')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Category")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('brands'),'active' => request()->routeIs('brands')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Brand")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('attributes'),'active' => request()->routeIs('attributes')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Attribute")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('colors'),'active' => request()->routeIs('colors')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Colors")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('catalogues'),'active' => request()->routeIs('catalogues')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-book"></i>
              <p>
                <?php echo e(__("Catalogue")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('slider'),'active' => request()->routeIs('slider')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                <?php echo e(__("Slider")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('pages'),'active' => request()->routeIs('pages')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-file"></i>
              <p>
                <?php echo e(__("Pages")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          
          <li class="nav-item <?php echo e(request()->routeIs('blog')?'menu-open':''); ?> <?php echo e(request()->routeIs('blog-category')?'menu-open':''); ?>">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['active' => (request()->routeIs('blog') || request()->routeIs('blog-category'))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-blog"></i>
              <p>
                <?php echo e(__("Blog System")); ?>

                <i class="right fas fa-angle-left"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('blog'),'active' => request()->routeIs('blog')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Blog")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('blog-category'),'active' => request()->routeIs('blog-category')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Blog Category")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo e(request()->routeIs('contact_inquiry')?'menu-open':''); ?> <?php echo e(request()->routeIs('dealer_inquiry')?'menu-open':''); ?> <?php echo e(request()->routeIs('vendor_inquiry')?'menu-open':''); ?> <?php echo e(request()->routeIs('product_inquiry')?'menu-open':''); ?>">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['active' => (request()->routeIs('contact_inquiry') || request()->routeIs('dealer_inquiry') || request()->routeIs('vendor_inquiry') || request()->routeIs('product_inquiry'))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-bell"></i>
              <p>
                <?php echo e(__("Inquiry Requests")); ?>

                <i class="right fas fa-angle-left"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('product_inquiry'),'active' => request()->routeIs('product_inquiry')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Product Inquiry")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('contact_inquiry'),'active' => request()->routeIs('contact_inquiry')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Contact Inquiry")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('dealer_inquiry'),'active' => request()->routeIs('dealer_inquiry')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Dealer Inquiry")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('vendor_inquiry'),'active' => request()->routeIs('vendor_inquiry')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Vendor Inquiry")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('uploaded-files.index'),'active' => request()->routeIs('uploaded-files.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-file"></i>
              <p>
                <?php echo e(__("Uploaded Files")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('dealer'),'active' => request()->routeIs('dealer')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-users"></i>
              <p>
                <?php echo e(__("Dealers")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('site_settings'),'active' => request()->routeIs('site_settings')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-users"></i>
              <p>
                <?php echo e(__("Settings")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('gallery'),'active' => request()->routeIs('gallery')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-images"></i>
              <p>
                <?php echo e(__("gallery")); ?>

                <i class="right fas fa-angle-right"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
          </li>
          <li class="nav-item <?php echo e(request()->routeIs('career.*')?'menu-open':''); ?> <?php echo e(request()->routeIs('career')?'menu-open':''); ?> <?php echo e(request()->routeIs('career_request.*')?'menu-open':''); ?> <?php echo e(request()->routeIs('career_request')?'menu-open':''); ?>">
            <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['active' => (request()->routeIs('career.*') || request()->routeIs('career_request.*'))] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                <?php echo e(__("Careers")); ?>

                <i class="right fas fa-angle-left"></i>
              </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('career'),'active' => request()->routeIs('career')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Career Posts")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4 = $component; } ?>
<?php $component = App\View\Components\SidebarNavLink::resolve(['href' => route('career_request'),'active' => request()->routeIs('career_request')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e(__("Career Request")); ?></p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4)): ?>
<?php $component = $__componentOriginal4afca23514a647050f06b031ac224990087b9bf4; ?>
<?php unset($__componentOriginal4afca23514a647050f06b031ac224990087b9bf4); ?>
<?php endif; ?>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH E:\xampp\htdocs\ibon-backend\resources\views/admin_template/sidebar.blade.php ENDPATH**/ ?>