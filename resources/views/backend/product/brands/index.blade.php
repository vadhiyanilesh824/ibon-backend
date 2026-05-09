@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Brands') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title'=>__('Brand'), 'url' => '#' ]]" ></x-breadcrumb>
     
    @endsection
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-7">
              <div class="card">
                
                <div class="card-body">
                    <table class="datatable_with_buttons table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name')}}</th>
                                <th>{{ __('Logo')}}</th>
                                <th class="text-right">{{ __('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $key => $brand)
                                <tr>
                                    <td>{{ ($key+1) + ($brands->currentPage() - 1)*$brands->perPage() }}</td>
                                    <td>{{ $brand->name }}</td>
                                                            <td>
                                        <img src="{{ \App\Services\Helpers::uploaded_asset($brand->logo) }}" alt="{{ __('Brand')}}" class="h-50px">
                                    </td>
                                    <td class="text-right">
                                        <x-action-buttons :actions="@[
                                            ['title'=> __('Edit'),'link'=>route('brands.edit',$brand->id )],
                                            ['title'=> __('Delete'),'link'=>route('brands.destroy', $brand->id),'post'=>true]
                                            ]" />
 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{  __('Add New Brand') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.save') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">{{ __('Name')}}</label>
                                <input type="text" placeholder="{{ __('Name')}}" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ __('Logo')}} <small>({{  __('120x80') }})</small></label>
                                <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{  __('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{  __('Choose File') }}</div>
                                    <input type="hidden" name="logo" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ __('Meta Title')}}</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="{{ __('Meta Title')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ __('Meta Description')}}</label>
                                <textarea name="meta_description" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>
</x-admin-layout>
