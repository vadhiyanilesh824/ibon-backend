@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Products') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit Product') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="p-4" action="{{ route('products.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($product->id) }}" />
                        @csrf
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Product Name') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name"
                                placeholder="{{ __('Product Name') }}" onchange="update_sku()"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Product Short Description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="short_description" class="form-control summernote" id="summernote" cols="30"
                                rows="5">{{ $product->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Product Description') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" class="form-control summernote" id="summernote" cols="30"
                                rows="5">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Product Specification') }} <span
                                    class="text-danger">*</span></label>
                            <textarea name="specification" class="form-control summernote" id="summernote2" cols="30" rows="10">{{ $product->specification }}</textarea>
                        </div>
                        <div class="form-group" id="category">
                            <label class="col-from-label">{{ __('Category') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (isset($product) && $product->category_id == $category->id) {{ 'selected' }} @endif>
                                        {{ $category->name }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include(
                                            'backend.product.products.child_category',
                                            [
                                                'child_category' => $childCategory,
                                                'category' => isset($product) ? $product : null,
                                            ]
                                        )
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="brand">
                            <label class="col-from-label">{{ __('Brand') }}</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                                <option value="">{{ __('Select Brand') }}</option>
                                @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}"
                                        @if (isset($product) && $product->brand_id == $brand->id) {{ 'selected' }} @endif>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Tags') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tags" value="{{ $product->tags }}"
                                placeholder="{{ __('Type and hit enter to add a tag') }}">
                            <small
                                class="text-muted">{{ __('This is used for search. Input those words by which cutomer can find this product.') }}</small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('Preview Images') }}
                                <small>(600x600)</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="previews" class="selected-files" value="{{ $product->previews }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <small
                                class="text-muted">{{ __('These images are visible in product details page previews.') }}</small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('Gallery Images') }}
                                <small>(600x600)</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image"
                                data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="photos" value="{{ $product->photos }}"
                                    class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <small
                                class="text-muted">{{ __('These images are visible in product details page gallery. Use 600x600 sizes images.') }}</small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('Thumbnail Image') }}
                                <small>(300x300)</small></label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="thumbnail_img" value="{{ $product->thumbnail_img }}"
                                    class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <small
                                class="text-muted">{{ __('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.') }}</small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="signinSrEmail">{{ __('PDF') }}
                                </label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="document">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="pdf" value="{{ $product->pdf }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Colors') }}</label>
                            <select class="form-control select2" name="colors[]" id="colors" multiple>
                                @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)
                                    <option value="{{ $color->code }}"
                                        @if (isset($product) && in_array($color->code, json_decode($product->colors))) {{ 'selected' }} @endif>
                                        {{ $color->name }} ({{ $color->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-from-label">{{ __('Choose Attributes') }}</label>
                            <select class="form-control select2" name="choice_attributes" id="choice_attributes"
                                multiple>
                                @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                    <option value="{{ $attribute->id }}"
                                        @if (isset($product) && in_array($attribute->id, json_decode($product->attributes))) {{ 'selected' }} @endif>
                                        {{ $attribute->name }}</option>
                                @endforeach
                            </select>
                            <small
                                class="text-muted">{{ __('Choose the attributes of this product and then input values of each attribute') }}
                            </small>
                        </div>

                        <div class="customer_choice_options" id="customer_choice_options">
                            @foreach (json_decode($product->choice_options) as $key => $choice_option)
                                <div class="form-group ">
                                    <input type="hidden" name="choice_no[]"
                                        value="{{ $choice_option->attribute_id }}">
                                    <label
                                        class="col-from-label">{{ optional(\App\Models\Attribute::find($choice_option->attribute_id))->name }}</label>
                           
                                    <select class="form-control select2 attribute_choice" data-live-search="true"
                                        name="choice_options_{{ $choice_option->attribute_id }}[]" multiple>
                                        @foreach (\App\Models\AttributeValue::where('attribute_id', $choice_option->attribute_id)->get() as $row)
                                            <option value="{{ $row->value }}"
                                                @if (in_array($row->value, $choice_option->values)) selected @endif>
                                                {{ $row->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Video Provider') }}</label>
                            <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
                                <option value="youtube" @if (isset($product) && $product->video_provider == 'youtube') {{ 'selected' }} @endif>
                                    {{ __('Youtube') }}</option>
                                <option value="dailymotion"
                                    @if (isset($product) && $product->video_provider == 'dailymotion') {{ 'selected' }} @endif>
                                    {{ __('Dailymotion') }}</option>
                                <option value="vimeo" @if (isset($product) && $product->video_provider == 'vimeo') {{ 'selected' }} @endif>
                                    {{ __('Vimeo') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-from-label">{{ __('Video Link') }}</label>
                            <input type="text" class="form-control" name="video_link"
                                placeholder="{{ __('Video Link') }}" value="{{ $product->video_link }}">
                            <small
                                class="text-muted">{{ __("Use proper link without extra parameter. Don't use short share link/embeded iframe code.") }}</small>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Meta Title') }}</label>

                            <input type="text" class="form-control" name="meta_title"
                                value="{{ $product->meta_title }}" placeholder="{{ __('Meta Title') }}">

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">{{ __('Meta Description') }}</label>

                            <textarea name="meta_description" rows="5" class="form-control">{{ $product->meta_description }}</textarea>

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_featured"
                                    id="customSwitch1" @if (isset($product) && $product->is_featured == 1) {{ 'checked' }} @endif>
                                <label class="custom-control-label" for="customSwitch1">Is Featured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_trends" id="customSwitch2"
                                    @if (isset($product) && $product->is_trends == 1) {{ 'checked' }} @endif>
                                <label class="custom-control-label" for="customSwitch2">Is Trends</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_popular"
                                    @if (isset($product) && $product->is_popular == 1) {{ 'checked' }} @endif id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Is Popular</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_new" id="customSwitch4"
                                    @if (isset($product) && $product->is_new == 1) {{ 'checked' }} @endif>
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
        </script>
    @endsection
</x-admin-layout>
