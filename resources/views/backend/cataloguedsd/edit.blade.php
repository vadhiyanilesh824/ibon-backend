@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Catalogue') }}" page-description="">
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
                    <form class="p-4" action="{{ route('catalogue.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($catalogue->id) }}" />
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" placeholder="{{ __('title') }}" name="title" value="{{$catalogue->title}}" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="image" value="{{$catalogue->image}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pdf">{{ __('PDF') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="document">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="pdf" value="{{$catalogue->pdf}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pdf_url">{{ __('Pdf Url') }}</label>
                            <input type="text" placeholder="{{ __('Pdf Url') }}" value="{{$catalogue->pdf_url}}" name="pdf_url"
                                class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Category') }}</label>

                            <select class="form-control select2" name="category_id" required>
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{($catalogue->category_id == $category->id)?'selected':''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" value="{{$catalogue->description}}" class="form-control summernote" id="summernote" cols="30" rows="5">{{$catalogue->description}}</textarea>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{-- @section('js')
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.css') }}">
        <script src="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script>
            $(function() {
                // Summernote
                $('#summernote').summernote()
            })
        </script>
    @endsection --}}
</x-admin-layout>
