@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Address') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="p-4" action="{{ route('address.upsert') }}" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $address->id ?? 0 }}" />
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name"
                                    value="{{ $address->name ?? '' }}"
                                    placeholder="{{ __('Name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Address') }}</label>
                            <div class="col-sm-9">
                                <textarea name="address" rows="5" class="form-control"
                                    placeholder="Address">{{ $address->address ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="phone">{{ __('Phone') }} <i
                                    class="las la-language text-danger" title="{{ __('Translatable') }}"></i></label>
                            <div class="col-sm-9" id="phone_data">
                                @if (isset($address->phone) && is_array(json_decode($address->phone)))
                                    @foreach (json_decode($address->phone) as $key => $phone)
                                        @if ($key == 0)
                                            <div class="input-group mb-3">
                                                <input type="text" placeholder="{{ __('Phone') }}" id="phone"
                                                    name="phone[]" value="{{ $phone ?? '' }}" class="form-control"
                                                    required>
                                                <div class="input-group-append">
                                                    <button type="button" id="add_more_phone"
                                                        class="btn btn-primary input-group-text">Add More</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="input-group mb-3" id='p_{{$key}}'>
                                                <input type="text" placeholder="{{ __('Phone') }}" id="phone"
                                                    name="phone[]" value="{{ $phone ?? '' }}" class="form-control"
                                                    required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger input-group-text"
                                                        onclick="removePhone('p_{{$key}}')">Remove</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="input-group mb-3">
                                        <input type="text" placeholder="{{ __('Phone') }}" id="phone" name="phone[]"
                                            value="" class="form-control" required>
                                        <div class="input-group-append">
                                            <button type="button" id="add_more_phone"
                                                class="btn btn-primary input-group-text">Add More</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Email') }}</label>
                            <div class="col-sm-9" id="email_data">
                                @if (isset($address->email) && is_array(json_decode($address->email)))
                                    @foreach (json_decode($address->email) as $key => $email)
                                        @if ($key == 0)
                                            <div class="input-group mb-3">
                                                <input type="email" placeholder="{{ __('Email') }}" id="email"
                                                    name="email[]" value="{{ $email ?? '' }}" class="form-control"
                                                    required>
                                                <div class="input-group-append">
                                                    <button type="button" id="add_more_email"
                                                        class="btn btn-primary input-group-text">Add More</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="input-group mb-3" id='e_{{$key}}'>
                                                <input type="email" placeholder="{{ __('Email') }}" id="email"
                                                    name="email[]" value="{{ $email ?? '' }}" class="form-control"
                                                    required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger input-group-text"
                                                        onclick="removeEmail('e_{{$key}}')">Remove</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="input-group mb-3">
                                        <input type="email" placeholder="{{ __('Email') }}" id="email" name="email[]"
                                            value="" class="form-control" required>
                                        <div class="input-group-append">
                                            <button type="button" id="add_more_email"
                                                class="btn btn-primary input-group-text">Add More</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label">{{ __('Customer Care') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="customer_care"
                                    value="{{ $address->customer_care ?? '' }}"
                                    placeholder="{{ __('Customer Care') }}">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @section('js')
        <script>
            $('#add_more_phone').on('click', function() {
                const d = new Date();
                let time = d.getTime();
                var html =
                    '<div class="input-group mb-3" id="' + time +
                    '"><input type="text" placeholder="{{ __('Phone') }}" id="phone" name="phone[]"   class="form-control" required><div class="input-group-append">    <button type="button" class="btn btn-danger input-group-text" onclick="removePhone(' +
                    time + ')">Remove</button></div></div>';
                $('#phone_data').append(html);
            });

            function removePhone(t) {
                $('#' + t).remove();
            }
            $('#add_more_email').on('click', function() {
                const d = new Date();
                let time = d.getTime();
                var html =
                    '<div class="input-group mb-3" id="' + time +
                    '"><input type="text" placeholder="{{ __('email') }}" id="email" name="email[]"  class="form-control" required><div class="input-group-append">    <button type="button" class="btn btn-danger input-group-text" onclick="removePhone(' +
                    time + ')">Remove</button></div></div>';
                $('#email_data').append(html);
            });

            function removeEmail(t) {
                $('#' + t).remove();
            }
        </script>
    @endsection
</x-admin-layout>
