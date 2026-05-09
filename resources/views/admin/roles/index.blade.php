@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
<x-admin-layout page-title="{{ __('Roles') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title'=>__('Roles'), 'url' => '#' ]]" ></x-breadcrumb>
     
    @endsection
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                  <a href="{{ route('roles.add') }}" class="btn btn-primary btn-xs float-right">{{ __("Add") }}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Permissions') }}</th>
                                <th style="width:50px;">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $data)
                            <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->permissions->pluck('name') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Action')}}
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                        <li>
                                          <a href="{{ route('roles.edit', $data->id) }}" class="btn btn-link"><i class="dripicons-document-edit"></i> {{ __('Edit')}}</a>
                                        </li>
                                        <li class="divider"></li>
                                        <form method="POST" action="{{ route('roles.destroy', $data->id) }}">
                                          @csrf
                                        <li>
                                            <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{ __('Delete')}}</button>
                                        </li>
                                        </form>
                                    </ul>
                                </div>
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
