@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Career Requests') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Career Requests'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Post Name') }}</th>
                                <th>{{ __('Full Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('View Resume') }}</th>
                                <th class="text-right">{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($career_request as $key => $cr)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cr->career->title }}</td>
                                    <td>{{ $cr->full_name }}</td>
                                    <td>{{ $cr->email }}</td>
                                    <td>{{ $cr->phone }}</td>
                                    <td><a href="{{ \App\Services\Helpers::uploaded_asset($cr->resume) }}" class="btn btn-primary btn-sm" target="_blank">View Resume</a></td>
                                    <td class="text-right">
                                        <x-action-buttons :actions="@[
                                            [
                                                'title' => __('View'),
                                                'link' => route('career_request.show', $cr->id),
                                            ],
                                            [
                                                'title' => __('Delete'),
                                                'link' => route('career_request.destroy', $cr->id),
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
