<x-admin-layout page-title="{{ __('User') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ __('Add new') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route('user.update',['id'=>$user->id]) }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputName1" placeholder="Full Name">
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                 
                  <div class="form-group">
                    <label for="permissions">{{ __('Permissions') }}</label>

                    <Select id="role" class="form-control" name="role">
                       
                        @foreach($all_roles_in_database as $data)
                            <option value="{{$data->id}}" @if($user->hasAnyRole($data->name)) {{ 'selected = true' }}  @endif   >{{$data->name}}</option>
                        @endforeach
                     
                    </Select>
                    
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
    </div>
  </x-admin-layout>