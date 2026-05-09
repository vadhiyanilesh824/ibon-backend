@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Slides') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Slider'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="card">

                        <div class="card-body">
                            <table class="datatable_with_buttons table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $key => $slides)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $slides->title }}</td>
                                            <td>
                                                <img src="{{ \App\Services\Helpers::uploaded_asset($slides->image) }}"
                                                    alt="{{ __('Slide') }}" class="h-50px">
                                            </td>
                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('slider.edit', $slides->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('slider.destroy', $slides->id),
                                                        'post' => true,
                                                    ],
                                                ]" />

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ __('Add New Slide') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.save') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" placeholder="{{ __('title') }}" name="title"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('Image') }}</label>
                                    <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ __('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                        <input type="hidden" name="image" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-from-label">{{ __('Text Overlay') }} <span
                                            class="text-danger">(Html Code)*</span></label>
                                    <textarea name="slider_texts" class="form-control codeMirrorDemo" id="codeMirrorDemo" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('js')
        <!-- CodeMirror -->
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/codemirror/codemirror.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/codemirror/theme/monokai.css') }}">
        <!-- CodeMirror -->
        <script src="{{ asset('theme/admin/plugins/codemirror/codemirror.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/css/css.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
        <script src="{{ asset('theme/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
        <script>
            $(function() {

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })
        </script>
    @endsection
</x-admin-layout>
