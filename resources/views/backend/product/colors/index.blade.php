@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Colors') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Colors'), 'url' => '#']]"></x-breadcrumb>
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
                                        <th>{{ __('Code') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $key => $color)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $color->name }}</td>
                                            <td>{{ $color->code }}</td>
                                            </td>
                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('colors.edit', $color->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('colors.destroy', $color->id),
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
                            <h5 class="mb-0 h6">{{ __('Add New Color') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('colors.save') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" placeholder="{{ __('Name') }}" id="name" name="name"
                                        class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('Color Code') }}</label>
                                    <input type="text" placeholder="{{ __('Color Code') }}" id="code" name="code"
                                        class="form-control" value="{{ old('code') }}" required>
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
