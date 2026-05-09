@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Dealers') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Dealers'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dealer.add') }}"
                        class="btn btn-primary btn-xs float-right">{{ __('Add') }}</a>
                </div>
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Company Name') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('State') }}</th>
                                <th>{{ __('City') }}</th>
                                <th class="text-right">{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiry as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->company_name }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ $i->phone }}</td>
                                    <td>{{ $i->country }}</td>
                                    <td>{{ $i->state }}</td>
                                    <td>{{ $i->city }}</td>
                                    <td class="text-right">
                                        <x-action-buttons :actions="@[
                                            [
                                                'title' => __('Edit'),
                                                'link' => route('dealer.edit', $i->id),
                                            ],
                                            [
                                                'title' => __('Delete'),
                                                'link' => route('dealer.destroy', $i->id),
                                                'post'=>true
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
    </section>
</x-admin-layout>
