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
                                        <th>{{ __('Show in Home') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catalogue as $key => $cat)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $cat->title }}</td>
                                            <td>
                                                <img src="{{ \App\Services\Helpers::uploaded_asset($cat->image) }}"
                                                    alt="{{ __('Slide') }}" class="h-50px">
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_home"
                                                        id="customSwitch4{{ $cat->id }}"
                                                        data-id="{{ $cat->id }}" onchange="change_section(this)"
                                                        {{ $cat->is_home == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch4{{ $cat->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('catalogue.edit', $cat->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('catalogue.destroy', $cat->id),
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
                            <h5 class="mb-0 h6">{{ __('Add New Catalogue') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('catalogue.save') }}" method="POST">
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
                                <div class="form-group mb-3">
                                    <label for="pdf">{{ __('PDF') }}</label>
                                    <div class="input-group" data-toggle="dsjuploader" data-type="document">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ __('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                        <input type="hidden" name="pdf" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pdf_url">{{ __('Pdf Url') }}</label>
                                    <input type="text" placeholder="{{ __('Pdf Url') }}" name="pdf_url"
                                        class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Category') }}</label>

                                    <select class="form-control select2" name="category_id" required>
                                        <option value="">{{ __('Select Category') }}</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach --}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('backend.product.category.child_category', [
                                                    'child_category' => $childCategory,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="col-from-label">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control summernote" id="summernote" cols="30" rows="5"></textarea>
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
        <script>
            function change_section(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('catalogue.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 1,
                        },
                        success: function(data) {
                            if (data.success == 0) {
                                $(event).removeAttr("checked");
                            }
                        }
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('catalogue.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 0,
                        },
                        success: function(data) {
                            if (data.success == 0) {
                                $(event).attr("checked", "checked");
                            }
                        }
                    });
                }
            }
        </script>
    @endsection
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
