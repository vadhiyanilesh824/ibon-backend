<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('theme/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('theme/admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open-->
               <li class="nav-item">
                <x-sidebar-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{ __("Dashboard") }}
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </x-sidebar-nav-link>
               </li>

               {{-- <li class="nav-item">
                <x-sidebar-nav-link>
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{ __("Roles") }}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </x-sidebar-nav-link>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-sidebar-nav-link :href="route('permission')" :active="request()->routeIs('permission')" >
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __("Permission") }}</p>
                    </x-sidebar-nav-link>
                  </li>
                  <li class="nav-item">
                    <x-sidebar-nav-link :href="route('roles')" :active="request()->routeIs('roles')" >
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __("Roles") }}</p>
                    </x-sidebar-nav-link>
                  </li>
                 
                </ul>
              </li>
          @hasanyrole("admin|manager")
          <li class="nav-item">
            <x-sidebar-nav-link>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __("Users") }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </x-sidebar-nav-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('user')" :active="request()->routeIs('user')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("List") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link  :href="route('user.add')" :active="request()->routeIs('user.add')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Add") }}</p>
                </x-sidebar-nav-link>
              </li>
            </ul>
          </li>
          @endhasanyrole --}}
          {{-- <li class="nav-item">
            <x-sidebar-nav-link>
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </x-sidebar-nav-link>
          </li> --}}

          <li class="nav-item 
          {{request()->routeIs('products')?'menu-open':''}} 
          {{request()->routeIs('category')?'menu-open':''}} 
          {{request()->routeIs('brands')?'menu-open':''}} 
          {{request()->routeIs('attributes')?'menu-open':''}} 
          {{request()->routeIs('colors')?'menu-open':''}}
          ">
            <x-sidebar-nav-link :active="(request()->routeIs('products')
              || request()->routeIs('category')
              || request()->routeIs('brands')
              || request()->routeIs('attributes')
              || request()->routeIs('colors'))">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                {{ __("Products") }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </x-sidebar-nav-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('products')" :active="request()->routeIs('products')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Products") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('category')" :active="request()->routeIs('category')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Category") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('brands')" :active="request()->routeIs('brands')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Brand") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('attributes')" :active="request()->routeIs('attributes')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Attribute") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('colors')" :active="request()->routeIs('colors')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Colors") }}</p>
                </x-sidebar-nav-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <x-sidebar-nav-link :href="route('catalogues')" :active="request()->routeIs('catalogues')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{ __("Catalogue") }}
                <i class="right fas fa-angle-right"></i>
              </p>
            </x-sidebar-nav-link>
          </li>
          <li class="nav-item">
            <x-sidebar-nav-link :href="route('slider')" :active="request()->routeIs('slider')">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                {{ __("Slider") }}
                <i class="right fas fa-angle-right"></i>
              </p>
            </x-sidebar-nav-link>
          </li>
          <li class="nav-item">
            <x-sidebar-nav-link :href="route('pages')" :active="request()->routeIs('pages')">
              <i class="nav-icon fas fa-file"></i>
              <p>
                {{ __("Pages") }}
                <i class="right fas fa-angle-right"></i>
              </p>
            </x-sidebar-nav-link>
          </li>
          <li class="nav-item {{request()->routeIs('blog')?'menu-open':''}} {{request()->routeIs('blog-category')?'menu-open':''}}">
            <x-sidebar-nav-link :active="(request()->routeIs('blog') || request()->routeIs('blog-category'))">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                {{ __("Blog System") }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </x-sidebar-nav-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('blog')" :active="request()->routeIs('blog')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Blog") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('blog-category')" :active="request()->routeIs('blog-category')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Blog Category") }}</p>
                </x-sidebar-nav-link>
              </li>
            </ul>
          </li>
          <li class="nav-item {{request()->routeIs('contact_inquiry')?'menu-open':''}} {{request()->routeIs('dealer_inquiry')?'menu-open':''}} {{request()->routeIs('vendor_inquiry')?'menu-open':''}} {{request()->routeIs('product_inquiry')?'menu-open':''}}">
            <x-sidebar-nav-link :active="(request()->routeIs('contact_inquiry') || request()->routeIs('dealer_inquiry') || request()->routeIs('vendor_inquiry') || request()->routeIs('product_inquiry'))" >
              <i class="nav-icon fas fa-bell"></i>
              <p>
                {{ __("Inquiry Requests") }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </x-sidebar-nav-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('product_inquiry')" :active="request()->routeIs('product_inquiry')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Product Inquiry") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('contact_inquiry')" :active="request()->routeIs('contact_inquiry')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Contact Inquiry") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('dealer_inquiry')" :active="request()->routeIs('dealer_inquiry')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Dealer Inquiry") }}</p>
                </x-sidebar-nav-link>
              </li>
              <li class="nav-item">
                <x-sidebar-nav-link :href="route('vendor_inquiry')" :active="request()->routeIs('vendor_inquiry')" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __("Vendor Inquiry") }}</p>
                </x-sidebar-nav-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <x-sidebar-nav-link :href="route('dealer')" :active="request()->routeIs('dealer')">
              <i class="nav-icon fas fa-users"></i>
              <p>
                {{ __("Dealers") }}
                <i class="right fas fa-angle-right"></i>
              </p>
            </x-sidebar-nav-link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>