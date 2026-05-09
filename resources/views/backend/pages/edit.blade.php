@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Page') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="p-4" action="{{ route('pages.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($page->id) }}" />
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" placeholder="{{ __('Title') }}" name="title" value="{{$page->title}}" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_title">{{ __('Meta Title') }}</label>
                            <input type="text" placeholder="{{ __('Meta Title') }}" name="meta_title" value="{{$page->meta_title}}"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('image') }}</label>
                            <div class="input-group" data-toggle="dsjuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ __('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input type="hidden" name="meta_image" value="{{$page->meta_image}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_tages">{{ __('Meta Tages') }}</label>
                            <input type="text" class="form-control" name="meta_tages" value="{{$page->meta_tages}}"
                                placeholder="{{ __('Meta Tages') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Meta Description') }}</label>
                            <textarea name="meta_description" value="{{$page->meta_description}}" rows="5" class="form-control">{{$page->meta_description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_keys">{{ __('Meta Keys') }}</label>
                            <input type="text" class="form-control" name="meta_keys" value="{{$page->meta_keys}}"
                                placeholder="{{ __('Meta Keys') }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Select Page')}}</label>
                          
                            <select class="form-control" name="page_route">
                                <option value="" @if(null == $page->page_route) selected @endif>Select Page</option>
                                @foreach ($routes as $route)
                                    @if($route != 'site.product_detail' && $route != 'site.blog_detail')
                                        <option value="{{ $route }}" @if($route == $page->page_route) selected @endif>{{  str_replace(url("/").'/'," ",route($route));  }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
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
</x-admin-layout>
