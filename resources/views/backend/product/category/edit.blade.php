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
                    <form class="p-4" action="{{ route('category.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($category->id) }}" />
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Name') }} <i
                                    class="las la-language text-danger" title="{{ __('Translatable') }}"></i></label>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                    id="name" placeholder="{{ __('Name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Short Description') }}</label>

                            <textarea name="short_description" rows="3" class="form-control">{{ $category->short_description }}</textarea>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Parent Category') }}</label>
                            <div class="col-md-9">
                                <select class=" form-control select2 dsj-selectpicker" name="parent_id"
                                    data-toggle="select2" data-placeholder="Choose ..." data-live-search="true"
                                    data-selected="{{ $category->parent_id }}">
                                    <option value="0">{{ __('No Parent') }}</option>
                                    @foreach ($categories as $acategory)
                                        <option value="{{ $acategory->id }}"
                                            @if ($acategory->id == $category->parent_id) {{ 'selected' }} @endif>
                                            {{ $acategory->name }}</option>
                                        @foreach ($acategory->childrenCategories as $childCategory)
                                            @include(
                                                'backend.product.category.child_category',
                                                [
                                                    'child_category' => $childCategory,
                                                    'category' => $category,
                                                ]
                                            )
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ __('Ordering Number') }}
                            </label>
                            <div class="col-md-9">
                                <input type="number" name="order_level" value="{{ $category->order_level }}"
                                    class="form-control" id="order_level" placeholder="{{ __('Order Level') }}">
                                <small>{{ __('Higher number has high priority') }}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Type') }}</label>
                            <div class="col-md-9">
                                <select name="digital" required class="form-control dsj-selectpicker mb-2 mb-md-0">
                                    <option value="0" @if ($category->digital == '0') selected @endif>
                                        {{ __('Physical') }}</option>
                                    <option value="1" @if ($category->digital == '1') selected @endif>
                                        {{ __('Digital') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Banner') }}
                                <small>({{ __('200x200') }})</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="banner" class="selected-files"
                                        value="{{ $category->banner }}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Icon') }}
                                <small>({{ __('32x32') }})</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ __('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input type="hidden" name="icon" class="selected-files"
                                        value="{{ $category->icon }}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Meta Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $category->meta_title }}" placeholder="{{ __('Meta Title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Meta Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" rows="5" class="form-control">{{ $category->meta_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Slug') }}</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ __('Slug') }}" id="slug" name="slug"
                                    value="{{ $category->slug }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{ __('Category description') }} <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control summernote" id="summernote2" cols="30"
                                    rows="10">{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{ __('Category Specification') }} <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="specification" class="form-control summernote" id="summernote2" cols="30"
                                    rows="10">{{ $category->specification }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('Filtering Attributes') }}</label>
                            <div class="col-md-9">
                                <select class="select2 form-control" name="filtering_attributes[]" id="choice_attributes" multiple>
                                    @foreach (\App\Models\Attribute::all() as $attribute)
                                        <option value="{{ $attribute->id }}"
                                            {{ in_array($attribute->id, $category->attributes->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="customer_choice_options" id="customer_choice_options">
                            @foreach (json_decode($category->attributes) as $key => $choice_option)
                                <div class="form-group row">
                                    <input type="hidden" name="choice_no[]" value="{{ $choice_option->id }}">
                                    <label
                                        class="col-md-3 col-from-label">{{ optional(\App\Models\Attribute::find($choice_option->id))->name }}</label>
                                    <div class="col-md-9">

                                        <select class="form-control select2 attribute_choice" data-live-search="true"
                                            name="choice_options_{{ $choice_option->id }}[]" multiple>
                                            @foreach (\App\Models\AttributeValue::where('attribute_id', $choice_option->id)->get() as $row)
                                                <option value="{{ $row->value }}"
                                                    @if (isset($choice_option->pivot->attribute_value) && is_array(json_decode($choice_option->pivot->attribute_value)) && in_array($row->value, json_decode($choice_option->pivot->attribute_value))) selected @endif>
                                                    {{ $row->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" {{$category->featured == 1?'checked':''}} name="featured"
                                    id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Featured</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" {{$category->special == 1?'checked':''}} name="special" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Special</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" value="1" {{$category->top == 1?'checked':''}} name="top"
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
                        $('#customer_choice_options').append(
                            '\
                                                                                                <div class="form-group row">\
                                                                                                        <label class="col-md-3 col-form-label">' +
                            name +
                            '</label><div class="col-md-9">\
                                                                                                        <input type="hidden" name="choice_no[]" value="' +
                            i +
                            '">\
                                                                                                        <select class="form-control select2 attribute_choice" placeholder="select ' +
                            name + '" name="choice_options_' +
                            i + '[]" multiple>\
                                                                                                            ' + obj + '\
                                                                                                        </select>\
                                                                                                </div></div>');
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
