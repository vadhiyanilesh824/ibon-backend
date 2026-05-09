@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Gallery Image') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __(isset($gallery)?'Edit':'Add') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="p-4" action="{{ route('gallery.upsert') }}" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$gallery->id??0}}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="video_url">{{ __('Type') }}</label>
                            <select name="type" id="" class="select2 form-control dsj-selectpicker">
                                <option value="image" selected>Image</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" placeholder="{{ __('Title') }}" value="{{$gallery->title??''}}" name="title"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Description') }}</label>
                                <textarea name="description" rows="5" class="form-control"
                                    placeholder="Description">{{ $gallery->description ?? '' }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="image" value="{{$gallery->image??''}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Cover Image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="cover_image" value="{{$gallery->cover_image??''}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="video_link">{{ __('Video Link') }}</label>
                            <input type="text" placeholder="{{ __('Video Link') }}" value="{{$gallery->video_link??''}}" name="video_link"
                                class="form-control">
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
