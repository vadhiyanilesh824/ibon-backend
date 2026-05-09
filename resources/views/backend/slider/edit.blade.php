@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Slider') }}" page-description="">
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
                    <form class="p-4" action="{{ route('slider.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($slider->id) }}" />
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="title">{{ __('Title') }} <i
                                    class="las la-language text-danger" title="{{ __('Translatable') }}"></i></label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Title') }}" id="title" name="title"
                                    value="{{ $slider->title }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Image') }}</label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="image" value="{{ $slider->image }}"
                                        class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Text Overlay') }} <span class="text-danger">(Html
                                    Code)*</span></label>
                            <textarea name="slider_texts" class="form-control codeMirrorDemo" value="{{ $slider->slider_text }}"
                                id="codeMirrorDemo" cols="30" rows="5">{{ $slider->slider_text }}</textarea>
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
    @section('js')
        <!-- CodeMirror -->
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/codemirror/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/codemirror/theme/monokai.css') }}">
        <!-- CodeMirror -->
        <script src="{{ asset('theme/admin/plugins/codemirror/codemirror.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/css/css.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/php/php.js') }}"></script>
        <script>
            $(function() {

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "application/x-httpd-php", // Or "php"
                    theme: "monokai"
                });
            })
        </script>
    @endsection
</x-admin-layout>
