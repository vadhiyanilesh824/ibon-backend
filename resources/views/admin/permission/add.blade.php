<x-admin-layout page-title="{{ __('Permission') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ __('Add new') }}</h3>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route('permission.save') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __("Permission Name") }}</label>
                        <input type="text" name="permission" class="form-control" id="exampleInputName1" placeholder="{{ __("Permission Name") }}">
                      </div>
                 
                      <label for="assign">{{ __('Assign Role') }} </label>
                        <div class="form-group">
                            <div class="row">
                                @foreach ($roles as $key => $role)
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <input name="roles[]" id="item_checkbox_{{ $key }}"
                                                value="{{ $key }}" type="checkbox">
                                            <label for="item_checkbox_{{ $key }}">
                                                {{ $role }}
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