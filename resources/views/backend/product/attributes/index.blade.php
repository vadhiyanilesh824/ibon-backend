@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Attributes') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Attributes'), 'url' => '#']]"></x-breadcrumb>
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
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Values') }}</th>
                                        <th>{{ __('Is Show In List') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $key => $attribute)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $attribute->name }}</td>
                                            <td>
                                                @foreach ($attribute->attribute_values as $key => $value)
                                                    <span class="badge badge-info">{{ $value->value }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_show_in_list"
                                                        id="customSwitch4{{ $attribute->id }}"
                                                        data-id="{{ $attribute->id }}" onchange="change_show_in_list_status(this)"
                                                        {{ $attribute->is_show_in_list == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch4{{ $attribute->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('Values'),
                                                        'link' => route('attribute_value', $attribute->id),
                                                    ],
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('attributes.edit', $attribute->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('attributes.destroy', $attribute->id),
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
                            <h5 class="mb-0 h6">{{ __('Add New Attribute') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('attributes.save') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" placeholder="{{ __('Name') }}" id="name" name="name"
                                        class="form-control" required>
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
            function change_show_in_list_status(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{ route('attributes.change_show_in_list_status') }}",
                        data: {
                            id: $(event).attr('data-id'),
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
                        type: "POST",
                        url: "{{ route('attributes.change_show_in_list_status') }}",
                        data: {
                            id: $(event).attr('data-id'),
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
</x-admin-layout>
