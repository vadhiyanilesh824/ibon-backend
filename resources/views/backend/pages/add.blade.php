@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Page') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Add New') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form action="{{ route('pages.save') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" placeholder="{{ __('Title') }}" name="title" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_title">{{ __('Meta Title') }}</label>
                            <input type="text" placeholder="{{ __('Meta Title') }}" name="meta_title" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="meta_image" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_tages">{{ __('Meta Tages') }}</label>
                            <input type="text" class="form-control" name="meta_tages"
                                placeholder="{{ __('Meta Tages') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Meta Description') }}</label>
                            <textarea name="meta_description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_keys">{{ __('Meta Keys') }}</label>
                            <input type="text" class="form-control" name="meta_keys"
                                placeholder="{{ __('Meta Keys') }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Select Page')}}</label>
                          
                            <select class="form-control" name="page_route">
                                <option value="">Select Page</option>
                                @foreach ($routes as $route)
                                    @if($route != 'site.product_detail' && $route != 'site.blog_detail' )
                                        <option value="{{ $route }}">{{  str_replace(url("/").'/'," ",route($route));  }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
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
</x-admin-layout>
