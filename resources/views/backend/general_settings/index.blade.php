@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Site Settings') }}" page-description="">
    <form class="p-4" action="{{ route('site_settings.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Company Information') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="company_name">{{ __('Company Name') }} </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Company Name') }}" id="company_name"
                                    name="company_name[text]" value="{{ site_settings('company_name', false) }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Logo') }}</label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="logo[image]" value="{{ site_settings('logo', false) }}"
                                        class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"
                                for="signinSrEmail">{{ __('Footer Logo') }}</label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="footer_logo[image]"
                                        value="{{ site_settings('footer_logo', false) }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Icon Logo') }}
                                <small>({{ __('100x100') }})</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="meta_logo[image]"
                                        value="{{ site_settings('meta_logo', false) }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email[text]"
                                    value="{{ site_settings('email', false) }}"
                                    placeholder="{{ __('Email Address') }}">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Receive Emails') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="receive_email[text]"
                                    value="{{ site_settings('receive_email', false) }}"
                                    placeholder="{{ __('Receive Email Address') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Phone No') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone[text]"
                                    value="{{ site_settings('phone', false) }}"
                                    placeholder="{{ __('Phone No') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Customer Care') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="customer_care[text]"
                                    value="{{ site_settings('customer_care', false) }}"
                                    placeholder="{{ __('Customer Care') }}">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Phone No') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone1[text]"
                                    value="{{ site_settings('phone1', false) }}"
                                    placeholder="{{ __('Phone No') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Phone No 2') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone2[text]"
                                    value="{{ site_settings('phone2', false) }}"
                                    placeholder="{{ __('Phone No 2') }}">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Address') }}</label>
                            <div class="col-sm-9">
                                <textarea name="address[text]" rows="3" class="form-control">{{ site_settings('address', false) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Addresses') }}</h3>
                        <a href="{{ route('address.create') }}"
                            class="btn btn-primary btn-xs float-right">{{ __('Add') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($address as $key=>$a)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <strong>{!! $a->name !!}</strong>
                                            </div>
                                            <div class="card-tools">
                                                <a href="{{ route('address.create',$a->id) }}" class="btn btn-tool">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if($a->is_main != 1)
                                                <a class="btn btn-tool" href="{{ route('address.destroy',$a->id) }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                            <p class="text-muted">{!! $a->address !!}</p>
                                            <hr>
                                            <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>
                                            <p class="text-muted">
                                                @foreach(json_decode($a->phone) as $phone)
                                                    {{$phone}} <br>
                                                @endforeach
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                            <p class="text-muted">
                                                @foreach(json_decode($a->email) as $email)
                                                    {{$email}} <br>
                                                @endforeach
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-phone mr-1"></i> Customer Care</strong>
                                            <p class="text-muted">{{$a->customer_care}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="card-title custom-control custom-switch  float-right">
                                                <input type="checkbox" class="custom-control-input" 
                                                    id="is_main_address_{{$key}}" onchange="changeMainAddress({{$a->id}})" {{($a->is_main==1)?'checked disabled':""}}>
                                                <label class="custom-control-label" for="is_main_address_{{$key}}">Main
                                                    Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Social Links') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="instagram_link">{{ __('Instagram') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Instagram') }}" id="instagram_link"
                                    name="instagram_link[text]" value="{{ site_settings('instagram_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="facebook_link">{{ __('Facebook') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Facebook') }}" id="facebook_link"
                                    name="facebook_link[text]" value="{{ site_settings('facebook_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="twitter_link">{{ __('Twitter') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Twitter') }}" id="twitter_link"
                                    name="twitter_link[text]" value="{{ site_settings('twitter_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="youtube_link">{{ __('Youtube') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Youtube') }}" id="youtube_link"
                                    name="youtube_link[text]" value="{{ site_settings('youtube_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="linkedin_link">{{ __('Linked In') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Linked In') }}" id="linkedin_link"
                                    name="linkedin_link[text]" value="{{ site_settings('linkedin_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="pinterest_link">{{ __('Pinterest') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Pinterest') }}" id="pinterest_link"
                                    name="pinterest_link[text]" value="{{ site_settings('pinterest_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="googleplus_link">{{ __('Google') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Google') }}" id="googleplus_link"
                                    name="googleplus_link[text]" value="{{ site_settings('googleplus_link', false) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Google Map') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="google_map">{{ __('Google Map') }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{ __('Google Map Embeded Link') }}"
                                    id="google_map" name="google_map[text]"
                                    value="{{ site_settings('google_map', false) }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </form>
    @section('js')
    <script>
        function changeMainAddress(id){
            location.href = '{{url("admin/address/change_main_address")}}'+'/'+id;
        }
    </script>
    @endsection
</x-admin-layout>
