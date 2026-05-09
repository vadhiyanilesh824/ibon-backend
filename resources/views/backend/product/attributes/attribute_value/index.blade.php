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
                                        <th>{{ __('Values') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_attribute_values as $key => $attribute_value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $attribute_value->value }}
                                            </td>

                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('attribute_value.edit', $attribute_value->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('attribute_value.destroy', $attribute_value->id),
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
                            <form action="{{ route('attribute_value.save') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">{{__('Attribute Name')}}</label>
                                    <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                    <input type="text" placeholder="{{ __('Name')}}" name="name" value="{{ $attribute->name }}"class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">{{__('Attribute Value')}}</label>
                                    <input type="text" placeholder="{{ __('Name')}}" id="value" name="value" class="form-control" required>
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
</x-admin-layout>
