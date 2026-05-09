@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Color') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ __('Edit') }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- form start -->
              <form class="p-4" action="{{ route('colors.update') }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="id" value="{{ Crypt::encryptString($color->id) }}" />
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">{{ __('Name')}} <i class="las la-language text-danger" title="{{ __('Translatable')}}"></i></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ __('Name')}}" id="name" name="name" value="{{ $color->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="code">
                      {{ __('Color Code')}} 
                  </label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="{{ __('Color Code')}}" id="code" name="code" class="form-control" required value="{{ $color->code }}">
                  </div>
              </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
                </div>
            </form>
              </div>
</div>
<!-- /.card -->
</div>
</div>
</x-admin-layout>

