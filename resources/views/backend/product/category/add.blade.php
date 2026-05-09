@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Category') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Add new') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('category.save') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="">{{ __('Name') }}</label>
                            <input type="text" placeholder="{{ __('Name') }}" id="name" name="name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Short Description') }}</label>

                            <textarea name="short_description" rows="3" class="form-control"></textarea>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Parent Category') }}</label>

                            <select class="select2 form-control dsj-selectpicker" name="parent_id" data-toggle="select2"
                                data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">{{ __('No Parent') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include(
                                            'backend.product.category.child_category',
                                            ['child_category' => $childCategory]
                                        )
                                    @endforeach
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">
                                {{ __('Ordering Number') }}
                            </label>
                            <input type="number" name="order_level" class="form-control" id="order_level"
                                placeholder="{{ __('Order Level') }}">
                            <small>{{ __('Higher number has high priority') }}</small>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Type') }}</label>

                            <select name="digital" required class="form-control dsj-selectpicker mb-2 mb-md-0">
                                <option value="0">{{ __('Physical') }}</option>
                                <option value="1">{{ __('Digital') }}</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('Banner') }}
                                <small>({{ __('200x200') }})</small></label>

                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('Icon') }}
                                <small>({{ __('32x32') }})</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="icon" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Meta Title') }}</label>

                            <input type="text" class="form-control" name="meta_title"
                                placeholder="{{ __('Meta Title') }}">

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">{{ __('Meta Description') }}</label>

                            <textarea name="meta_description" rows="5" class="form-control"></textarea>

                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Cayegory description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" class="form-control summernote" id="summernote2" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Cayegory Specification') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="specification" class="form-control summernote" id="summernote2" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Filtering Attributes') }}</label>
                            <select class="select2 form-control" name="filtering_attributes[]" id="choice_attributes"
                                multiple>
                                @foreach (\App\Models\Attribute::all() as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                            <small
                                class="text-muted">{{ __('Choose the attributes of this product and then input values of each attribute') }}
                            </small>
                        </div>
                        <div class="customer_choice_options" id="customer_choice_options">
                            
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" name="featured"
                                    id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Featured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" name="special" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Special</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" name="top"
                                    id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Top</label>
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
        <link rel="stylesheet" href="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.css') }}">
        <script src="{{ asset('theme/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script>
            function add_more_customer_choice_option(i, name) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '{{ route('products.add-more-choice-option') }}',
                    data: {
                        attribute_id: i
                    },
                    success: function(data) {
                        var obj = JSON.parse(data);
                        $('#customer_choice_options').append('\
                                                                        <div class="form-group">\
                                                                                <label class="col-form-label">' + name +
                            '</label>\
                                                                                <input type="hidden" name="choice_no[]" value="' +
                            i +
                            '">\
                                                                                <select class="form-control select2 attribute_choice" placeholder="select ' +
                            name + '" name="choice_options_' +
                            i + '[]" multiple>\
                                                                                    ' + obj + '\
                                                                                </select>\
                                                                        </div>');
                        $('.select2').select2();
                    }
                });
            }
            $('#choice_attributes').on('change', function() {
                $('#customer_choice_options').html(null);
                $.each($("#choice_attributes option:selected"), function() {
                    add_more_customer_choice_option($(this).val(), $(this).text());
                });
            });
            $(function() {
                // Summernote
                $('.summernote').summernote()
            })
        </script>
    @endsection
</x-admin-layout>
