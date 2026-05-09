@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Blog Category') }}" page-description="">
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
              <form class="p-4" action="{{ route('blog-category.update') }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="id" value="{{ Crypt::encryptString($cateogry->id) }}" />
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ __('Name')}}</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="{{ __('Name')}}" id="category_name" name="category_name" value="{{ $cateogry->category_name }}" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save')}}
                    </button>
                </div>
            </form>
              </div>
</div>
<!-- /.card -->
</div>
</div>
</x-admin-layout>

