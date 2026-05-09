@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
<x-admin-layout page-title="{{ __('Products') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Products'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                            {{-- @can('Add User') --}}
                            <a href="{{ route('products.add') }}"
                                class="btn btn-primary btn-xs float-right">{{ __('Add') }}</a>
                            {{-- @endcan --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="datatable_with_buttons table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Brand') }}</th>
                                        <th>{{ __('Is Featured') }}</th>
                                        <th>{{ __('Is Trends') }}</th>
                                        <th>{{ __('Is Popular') }}</th>
                                        <th>{{ __('Is New') }}</th>
                                        <th class="text-right">{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>
                                                <div class="row gutters-5 w-200px w-md-300px mw-100">
                                                    <div class="col-auto">
                                                        <img src="{{ \App\Services\Helpers::uploaded_asset($product->thumbnail_img) }}"
                                                            alt="Image" class="h-50px">
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                {{ $product->category->name }}
                                            </td>
                                            <td>
                                                {{-- {{ $product->brand->name }} --}}
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="is_featured" id="customSwitch1{{ $product->id }}"
                                                        data-id="{{$product->id}}" onchange="change_section(this)"
                                                        {{ $product->is_featured == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch1{{ $product->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_trends"
                                                        id="customSwitch2{{ $product->id }}"
                                                        data-id="{{$product->id}}" onchange="change_section(this)"
                                                        {{ $product->is_trends == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch2{{ $product->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="is_popular" id="customSwitch3{{ $product->id }}"
                                                        data-id="{{$product->id}}" onchange="change_section(this)"
                                                        {{ $product->is_popular == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch3{{ $product->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="is_new"
                                                        id="customSwitch4{{ $product->id }}"
                                                        data-id="{{$product->id}}" onchange="change_section(this)"
                                                        {{ $product->is_new == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="customSwitch4{{ $product->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <x-action-buttons :actions="@[
                                                    [
                                                        'title' => __('view'),
                                                        'link' => route('site.product_detail', $product->slug),
                                                    ],
                                                    [
                                                        'title' => __('Edit'),
                                                        'link' => route('products.edit', $product->id),
                                                    ],
                                                    [
                                                        'title' => __('Delete'),
                                                        'link' => route('products.destroy', $product->id),
                                                        'post' => true,
                                                    ],
                                                ]" />
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('js')
        <script>
            function change_section(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('products.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 1,
                        },
                        success: function(data) {
                            if(data.success == 0){
                                $(event).removeAttr("checked");
                            }
                        }
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('products.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 0,
                        },
                        success: function(data) {
                            if(data.success == 0){
                                $(event).attr("checked","checked");
                            }
                        }
                    });
                }
            }
        </script>
    @endsection
</x-admin-layout>
