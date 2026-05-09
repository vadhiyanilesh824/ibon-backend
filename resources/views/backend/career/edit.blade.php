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
                    <form action="{{ route('career.update') }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ $career->id }}" />
                        <div class="form-group mb-3">
                            <label for="company_name">{{ __('Title') }}</label>
                            <input type="text" placeholder="{{ __('Title') }}" name="title" value="{{$career->title}}"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Banner Image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="banner" value="{{$career->banner}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="short_description">{{ __('Short Description') }}</label>
                            <textarea name="short_description" rows="3" placeholder="{{ __('Short Description') }}" class="form-control">{{$career->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="long_description" class="form-control summernote" id="summernote" cols="30" rows="5">{{$career->long_description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Attachment') }}</label>
                            <div class="input-group" data-toggle="dsjuploader">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="attachments" value="{{$career->attachments}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="short_description">{{ __('Is Active Career Post') }}</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input"
                                    name="is_active" id="customSwitch3" {{($career->is_active == 1)?'checked':''}}>
                                <label class="custom-control-label"
                                    for="customSwitch3">Active</label>
                            </div>
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
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.css') }}">
        <script src="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
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
            $(function() {
                // Summernote
                $('.summernote').summernote()
            })
        </script>
    @endpush

</x-admin-layout>
