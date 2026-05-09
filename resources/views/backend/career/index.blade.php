@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Career Post') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Career Post'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('career.add') }}"
                        class="btn btn-primary btn-xs float-right">{{ __('Add') }}</a>
                </div>
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Banner') }}</th>
                                <th>{{ __('Short Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="text-right">{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($career as $key => $page)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>
                                        <img src="{{ \App\Services\Helpers::uploaded_asset($page->banner) }}"
                                            alt="{{ __('Banner') }}" class="h-50px">
                                    </td>
                                    <td>{{ $page->short_description }}</td>
                                    <td><span class="badge {{ ($page->is_active == 1)?'badge-success':'badge-danger' }}">{{ ($page->is_active == 1)?'Active':'Disable' }}</span></td>
                                    <td class="text-right">
                                        <x-action-buttons :actions="@[
                                            [
                                                'title' => __('Change Status'),
                                                'link' => route('career.change_status', $page->id),
                                                'post' => true,
                                            ],
                                            [
                                                'title' => __('Edit'),
                                                'link' => route('career.edit', $page->id),
                                            ],
                                            [
                                                'title' => __('Delete'),
                                                'link' => route('career.destroy', $page->id),
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
    </section>
</x-admin-layout>
