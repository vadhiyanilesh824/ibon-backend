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
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Post Name</th>
                                <td>{{ $career_request->career->title }}</td>
                            </tr>
                            <tr>
                                <th>Applied Date</th>
                                <td>{{ date('d-m-Y H:i a', strtotime($career_request->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Full Name</th>
                                <td>{{ $career_request->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $career_request->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $career_request->phone }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                @php
                                    $city = \App\Models\City::find($career_request->city_id);
                                    if($city){
                                        $state = \App\Models\State::find($city->state_id);
                                        $country = \App\Models\Country::find($city->country_id);
                                    }
                                @endphp
                                <td>{{ isset($city->name) ? $city->name.' , '.$state->name.' , '.$country->name.'.':''}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $career_request->address }}</td>
                            </tr>
                            <tr>
                                <th>Resume</th>
                                <td>
                                    <object data="{{ \App\Services\Helpers::uploaded_asset($career_request->resume) }}"  width="100%" height="400px">
                                        <p>If Resume Not Visible ! <a href="{{ \App\Services\Helpers::uploaded_asset($career_request->resume) }}" target="_blank">Click here To Download</a></p>
                                    </object>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
