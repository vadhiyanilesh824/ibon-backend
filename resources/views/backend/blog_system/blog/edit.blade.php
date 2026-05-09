@include('admin.uploader.uploader-script')
@push('css')
<link rel="stylesheet" href="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@push('script')
<script src="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.js') }}" ></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })
  </script>
@endpush
<x-admin-layout page-title="{{ __('Blog') }}" page-description="">
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
              <form id="add_form" class="form-horizontal" action="{{ route('blog.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ Crypt::encryptString($blog->id) }}" />
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        {{ __('Blog Title')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" placeholder="{{ __('Blog Title')}}" onkeyup="makeSlug(this.value)" id="title" name="title" value="{{ $blog->title }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="category">
                    <label class="col-md-3 col-from-label">
                        {{ __('Category')}} 
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-9">
                        <select
                            class="form-control dsj-selectpicker"
                            name="category_id"
                            id="category_id"
                            data-live-search="true"
                            required
                            @if($blog->category != null)
                            data-selected="{{ $blog->category->id }}"
                            @endif
                        >
                            <option>--</option>
                            @foreach ($blog_categories as $category)
                            <option value="{{ $category->id }}" @if($blog->category != null && $blog->category->id == $category->id)
                                {{ "selected" }}    
                                @endif>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ __('Slug')}}</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="{{ __('Slug')}}" name="slug" id="slug" value="{{ $blog->slug }}" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">
                        {{ __('Banner')}} 
                        <small>(1300x650)</small>
                    </label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="dsjuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                    {{  __('Browse')}}
                                </div>
                            </div>
                            <div class="form-control file-amount">{{  __('Choose File') }}</div>
                            <input type="hidden" name="banner" class="selected-files" value="{{ $blog->banner }}">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        {{ __('Short Description')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-9">
                        <textarea name="short_description" rows="5" class="form-control">{{ $blog->short_description }}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">
                        {{ __('Description')}}
                    </label>
                    <div class="col-md-9">
                        <textarea class="dsj-text-editor" id="summernote" name="description">{{ $blog->description }}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ __('Meta Title')}}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="meta_title" value="{{ $blog->meta_title }}" placeholder="{{ __('Meta Title')}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">
                        {{ __('Meta Image')}} 
                        <small>(200x200)+</small>
                    </label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="dsjuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                    {{  __('Browse')}}
                                </div>
                            </div>
                            <div class="form-control file-amount">{{  __('Choose File') }}</div>
                            <input type="hidden" name="meta_img" class="selected-files" value="{{ $blog->meta_img }}">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ __('Meta Description')}}</label>
                    <div class="col-md-9">
                        <textarea name="meta_description" rows="5" class="form-control">{{ $blog->meta_description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        {{ __('Meta Keywords')}}
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $blog->meta_keywords }}" placeholder="{{ __('Meta Keywords')}}">
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

