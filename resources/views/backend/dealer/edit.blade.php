@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Add Dealer') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Add New Dealer') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form action="{{ route('dealer.update') }}" method="POST">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($dealer->id) }}" />
                        @csrf
                        <div class="form-group mb-3">
                            <label for="company_name">{{ __('Company Name') }}</label>
                            <input type="text" placeholder="{{ __('Company Name') }}" name="company_name"
                                class="form-control" value="{{$dealer->company_name}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Person Name') }}</label>
                            <input type="text" placeholder="{{ __('Person Name') }}" value="{{$dealer->name}}" name="name" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" placeholder="{{ __('Email') }}" name="email" value="{{$dealer->email}}" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" placeholder="{{ __('Phone') }}" name="phone" value="{{$dealer->phone}}" class="form-control"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Country') }}</label>
                                    <select class="form-control select2" name="country" id="country" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{($country->id == $dealer->country_id)?'selected':""}}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('State') }}</label>
                                    <select class="form-control select2" name="state" id='state' required>
                                        <option value="{{$dealer->state_id}}" selected>{{$dealer->state}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('City') }}</label>
                                    <select class="form-control select2" name="city" id="city" required>
                                        <option value="{{$dealer->city_id}}" selected>{{$dealer->city}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Zip Code') }}</label>
                                    <input type="text" placeholder="{{ __('Zip Code') }}" value="{{$dealer->zipcode}}" name="zipcode"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea name="address" rows="5" class="form-control">{{$dealer->address}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Intrested Products') }}</label><br />
                            <label><input type="checkbox" class="" name="product_category[]"
                                    value="Out door" {{ (in_array('Out door',json_decode($dealer->product_type)))?'checked':''}}/> Out door
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Commercial" {{ (in_array('Commercial',json_decode($dealer->product_type)))?'checked':''}}/> Commercial
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Parking" {{ (in_array('Parking',json_decode($dealer->product_type)))?'checked':''}}/> Parking
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Kitchen" {{ (in_array('Kitchen',json_decode($dealer->product_type)))?'checked':''}}/> Kitchen
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Domestic" {{ (in_array('Domestic',json_decode($dealer->product_type)))?'checked':''}}/> Domestic
                                <span></span></label>
                        </div>
                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $('#country').on('change', function() {
                    var country_id = this.value;
                    $("#state").html('');
                    $.ajax({
                        url: "{{ route('states_by_country_id') }}",
                        type: "POST",
                        data: {
                            country_id: country_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#state').html('<option value="" selected>Select State</option>');
                            $.each(result, function(key, value) {
                                $("#state").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#city').html(
                                '<option value="">Select State First</option>');
                        }
                    });
                });
                $('#state').on('change', function() {
                    var state_id = this.value;
                    $("#city").html('');
                    $.ajax({
                        url: "{{ route('cities_by_state_id') }}",
                        type: "POST",
                        data: {
                            state_id: state_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#city').html('<option value="" selected>Select City</option>');
                            $.each(result, function(key, value) {
                                $("#city").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>
    @endpush

</x-admin-layout>
