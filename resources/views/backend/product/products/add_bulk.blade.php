@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Products') }}" page-description="">
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
                    <form class="form-horizontal" action="{{ route('products.bulk_save') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="category">
                            <label class="col-from-label">{{ __('Category') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include('backend.product.category.child_category', [
                                            'child_category' => $childCategory,
                                        ])
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="brand">
                            <label class="col-from-label">{{ __('Brand') }}</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                                <option value="">{{ __('Select Brand') }}</option>
                                @foreach (\App\Models\Brand::all() as $key => $brand)
                                    <option value="{{ $brand->id }}" {{ $key == 0 ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Tags') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tags"
                                placeholder="{{ __('Type and hit enter to add a tag') }}">
                            <small
                                class="text-muted">{{ __('This is used for search. Input those words by which cutomer can find this product.') }}</small>
                        </div>
                        <div id="">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th colspan="5">
                                            add multiple products
                                        </th>
                                        <th>
                                            <button type="button" onclick="addRow(this)" class="btn btn-sm btn-out"
                                                tabindex="-1"><i class="fa fa-plus"></i></button>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="multi_prod_sec">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-from-label">{{ __('Product Name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name[]"
                                                    placeholder="{{ __('Product Name') }}"
                                                    required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-from-label">{{ __('Product Short Description') }}
                                                    <span class="text-danger">*</span></label>
                                                <textarea name="short_description[]" class="form-control " id="" cols="30"></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Thumbnail Image') }}
                                                    <small>(300x300)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div
                                                            class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="thumbnail_img[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Preview Images') }}
                                                    <small>(600x600)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                                    data-multiple="true">
                                                    <div class="input-group-prepend">
                                                        <div
                                                            class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="previews[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Gallery Images') }}
                                                    <small>(600x600)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                                    data-multiple="true">
                                                    <div class="input-group-prepend">
                                                        <div
                                                            class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="photos[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            {{-- <button type="button" onclick="removeRow(this)"
                                                class="btn btn-sm btn-out" tabindex="-1"><i
                                                    class="fa fa-trash"></i></button> --}}

                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>







                        <div class="form-group">
                            <label class="col-from-label">{{ __('Colors') }}</label>
                            <select class="form-control select2" name="colors[]" id="colors" multiple>
                                @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)
                                    <option value="{{ $color->code }}">{{ $color->name }}
                                        ({{ $color->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-from-label">{{ __('Choose Attributes') }}</label>
                            <select class="form-control select2" name="choice_attributes" id="choice_attributes"
                                multiple>
                                @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                    <option value="{{ $attribute->id }}">
                                        {{ $attribute->name }}</option>
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
                                <input type="checkbox" class="custom-control-input" name="is_featured"
                                    id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Is Featured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_trends"
                                    id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Is Trends</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_popular"
                                    id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Is Popular</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_new"
                                    id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Is New</label>
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
                        $('#customer_choice_options').append(
                            '\
                                                                                                    <div class="form-group">\
                                                                                                            <label class="col-form-label">' +
                            name +
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

            function removeRow(e) {
                $(e).closest('tr').remove();
            }

            function addRow() {
                var html = `
                <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-from-label">{{ __('Product Name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name[]"
                                                    placeholder="{{ __('Product Name') }}"  required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-from-label">{{ __('Product Short Description') }} <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="short_description[]" class="form-control " id="" cols="30"></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Thumbnail Image') }}
                                                    <small>(300x300)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="thumbnail_img[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Preview Images') }}
                                                    <small>(600x600)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                                    data-multiple="true">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="previews[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                    for="signinSrEmail">{{ __('Gallery Images') }}
                                                    <small>(600x600)</small></label>
                                                <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                                    data-multiple="true">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                            {{ __('Browse') }}</div>
                                                    </div>
                                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                                    <input type="hidden" name="photos[]" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <button type="button" onclick="removeRow(this)" class="btn btn-sm btn-out"
                                                tabindex="-1"><i class="fa fa-trash"></i></button>
    
                                        </td>
                                    </tr>
                `;
                $('#multi_prod_sec').append(html);

            }
        </script>
    @endsection

</x-admin-layout>
