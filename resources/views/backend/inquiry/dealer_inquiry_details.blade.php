@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Dealer Request Detail') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Dealer Request Detail'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th style="width: 20%">{{ __('Date') }}</th>
                                <td>{{ date('d/m/Y h:i A', strtotime($inquiry->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Company Name') }}</th>
                                <td>{{ $inquiry->company_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <td>{{ $inquiry->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Email') }}</th>
                                <td>{{ $inquiry->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Phone') }}</th>
                                <td>{{ $inquiry->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Subject') }}</th>
                                <td>{{ $inquiry->subject }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Message') }}</th>
                                <td>{{ $inquiry->message }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Intrested Products') }}</th>
                                <td>
                                    <ul class="nav flex-column">
                                        @foreach (json_decode($inquiry->product_type) as $p)
                                            <li class="nav-item p-2">
                                                {{ $p }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Country') }}</th>
                                <td>{{ $inquiry->country }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('State') }}</th>
                                <td>{{ $inquiry->state }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('City') }}</th>
                                <td>{{ $inquiry->city }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Zip Code') }}</th>
                                <td>{{ $inquiry->zipcode }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Address') }}</th>
                                <td>{{ $inquiry->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
