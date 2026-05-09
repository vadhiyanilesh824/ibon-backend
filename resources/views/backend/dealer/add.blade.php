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
                    <form action="{{ route('dealer.save') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="company_name">{{ __('Company Name') }}</label>
                            <input type="text" placeholder="{{ __('Company Name') }}" name="company_name"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Person Name') }}</label>
                            <input type="text" placeholder="{{ __('Person Name') }}" name="name" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" placeholder="{{ __('Email') }}" name="email" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" placeholder="{{ __('Phone') }}" name="phone" class="form-control"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Country') }}</label>
                                    <select class="form-control select2" name="country" id="country" required>
                                        <option value="" selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('State') }}</label>
                                    <select class="form-control select2" name="state" id='state' required>
                                        <option value="" selected>Please Select Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('City') }}</label>
                                    <select class="form-control select2" name="city" id="city" required>
                                        <option value="" selected>Please Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Zip Code') }}</label>
                                    <input type="text" placeholder="{{ __('Zip Code') }}" name="zipcode"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea name="address" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Intrested Products') }}</label><br />
                            <label><input type="checkbox" class="" name="product_category[]"
                                    value="Out door" /> Out door
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Commercial" /> Commercial
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Parking" /> Parking
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Kitchen" /> Kitchen
                                <span></span></label><br />
                            <label><input type="checkbox" name="product_category[]" value="Domestic" /> Domestic
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
                            $('#state').html('<option value="">Select State</option>');
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
                            $('#city').html('<option value="">Select City</option>');
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
