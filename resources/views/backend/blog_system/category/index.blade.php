@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
<x-admin-layout page-title="{{ __('Blog Category') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title'=>__('Category'), 'url' => '#' ]]" ></x-breadcrumb>
     
    @endsection
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                  {{-- @can("Add User") --}}
                  <a href="{{ route('blog-category.add') }}" class="btn btn-primary btn-xs float-right">{{ __("Add") }}</a>
                  {{-- @endcan --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>{{ __('Full Name') }}</th>
                        <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($categories as $data)
                            <tr>
                            <td>{{ $data->category_name }}</td>
                            <td>
                              {{-- @can("Edit User","Delete User") --}}
                              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Action')}}
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    {{-- @can("Edit") --}}
                                    <li>
                                      <a href="{{ route('blog-category.edit', $data->id) }}" class="btn btn-link"><i class="dripicons-document-edit"></i> {{ __('Edit')}}</a>
                                    </li>
                                    {{-- @endcan
                                    @can("Delete") --}}
                                    <li class="divider"></li>
                                    <form method="POST" action="{{ route('blog-category.destroy', $data->id) }}">
                                      @csrf
                                    <li>
                                        <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{ __('Delete')}}</button>
                                    </li>
                                    {{-- @endcan --}}
                                    </form>
                                </ul>
                              </div>
                              {{-- @endcan --}}
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</x-admin-layout>
