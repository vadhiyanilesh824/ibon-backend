<x-admin-layout page-title="{{ __('Role') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ __('Add new') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route('roles.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ Crypt::encryptString($role->id) }}" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __("Role Name") }}</label>
                        <input type="text" name="role" value="{{ $role->name }}" class="form-control" id="exampleInputName1" placeholder="{{ __("Role Name") }}">
                      </div>
                 
                      <label for="assign">{{ __('Assign Permission') }} </label>
                        <div class="form-group">
                            <div class="row">
                                @foreach ($permissions as $key => $permission)
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <input name="permissions[]" id="item_checkbox_{{ $key }}"
                                                value="{{ $key }}" type="checkbox"
                                                @if (in_array($key, $role_permission)) checked @endif
                                                >
                                            <label for="item_checkbox_{{ $key }}">
                                                {{ $permission }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
    </div>
  </x-admin-layout>