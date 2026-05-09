@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Brand') }}" page-description="">
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
              <form class="p-4" action="{{ route('brands.update') }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="id" value="{{ Crypt::encryptString($brand->id) }}" />
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">{{ __('Name')}} <i class="las la-language text-danger" title="{{ __('Translatable')}}"></i></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ __('Name')}}" id="name" name="name" value="{{ $brand->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Logo')}} <small>({{  __('120x80') }})</small></label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="dsjuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{  __('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{  __('Choose File') }}</div>
                            <input type="hidden" name="logo" value="{{$brand->logo}}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label">{{ __('Meta Title')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="meta_title" value="{{ $brand->meta_title }}" placeholder="{{ __('Meta Title')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label">{{ __('Meta Description')}}</label>
                    <div class="col-sm-9">
                        <textarea name="meta_description" rows="8" class="form-control">{{ $brand->meta_description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">{{ __('Slug')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ __('Slug')}}" id="slug" name="slug" value="{{ $brand->slug }}" class="form-control">
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

