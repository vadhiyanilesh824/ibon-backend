@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Inquiry') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Inquiry'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Message') }}</th>
                                @if (request()->routeIs('product_inquiry'))
                                <th>{{ __('Product Name') }}</th>
                                @endif
                                <th class="text-right">{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiry as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ date('d/m/Y h:i A', strtotime($i->created_at)) }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ $i->phone }}</td>
                                    <td>{{ $i->subject }}</td>
                                    <td>{{ $i->message }}</td>
                                    @if (request()->routeIs('product_inquiry'))
                                    <td>{{ $i->product->name }}</td>
                                    @endif
                                    <td class="text-right">
                                        <x-action-buttons :actions="@[
                                            [
                                                'title' => __('Delete'),
                                                'link' => route('contact_inquiry.destroy', $i->id),
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
