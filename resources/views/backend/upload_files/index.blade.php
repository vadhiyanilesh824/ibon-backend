@section('script')
    <script src="{{ asset('js/ds-app.js') }}"></script>
    <script>
        var DSJ = DSJ || {};
    </script>
    <script type="text/javascript">
        function detailsInfo(e) {
            $('#info-modal-content').html(
                '<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>'
                );
            var id = $(e).data('id')
            $('#info-modal').modal('show');
            $.post('{{ route('uploaded-files.info') }}', {
                _token: DSJ.data.csrf,
                id: id
            }, function(data) {
                $('#info-modal-content').html(data);
                // console.log(data);
            });
        }

        function copyUrl(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                DSJ.plugins.notify('success', '{{ __('Link copied to clipboard') }}');
            } catch (err) {
                DSJ.plugins.notify('danger', '{{ __('Oops, unable to copy') }}');
            }
            $temp.remove();
        }

        function sort_uploads(el) {
            $('#sort_uploads').submit();
        }
        $(".confirm-delete").click(function(e) {
            e.preventDefault();
            var url = $(this).data("href");
            $("#delete-modal").modal("show");
            $("#delete-link").attr("href", url);
        });
    </script>
@endsection

<x-admin-layout page-title="{{ __('All uploaded files') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">

                    <form id="sort_uploads" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="mb-0 h6">{{ __('All files') }}</h5>
                            </div>
                            <div class="col-md-3 ml-auto mr-0">
                                <select class="form-control form-control-xs dsj-selectpicker" name="sort"
                                    onchange="sort_uploads()">
                                    <option value="newest" @if ($sort_by == 'newest') selected="" @endif>
                                        {{ __('Sort by newest') }}</option>
                                    <option value="oldest" @if ($sort_by == 'oldest') selected="" @endif>
                                        {{ __('Sort by oldest') }}</option>
                                    <option value="smallest" @if ($sort_by == 'smallest') selected="" @endif>
                                        {{ __('Sort by smallest') }}</option>
                                    <option value="largest" @if ($sort_by == 'largest') selected="" @endif>
                                        {{ __('Sort by largest') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control form-control-xs" name="search"
                                    placeholder="{{ __('Search your files') }}" value="{{ $search }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('uploaded-files.create') }}"
                                    class="btn btn-primary pull-right float-right">
                                    <span>{{ __('Upload New File') }}</span>
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.card-header -->
                <div class="card-body">



                    <div>

                        <div>
                            <div class="row gutters-5">
                                @foreach ($all_uploads as $key => $file)
                                    @php
                                        if ($file->file_original_name == null) {
                                            $file_name = __('Unknown');
                                        } else {
                                            $file_name = $file->file_original_name;
                                        }
                                    @endphp
                                    <div class="col-auto w-140px w-lg-220px col-md-4 col-xs-2">
                                        <div class="dsj-file-box">
                                            <div class="dropdown-file">
                                                <a class="dropdown-link" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- <a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="{{ $file->id }}">
    								<i class="las la-info-circle mr-2"></i>
    								<span>{{  __('Details Info') }}</span>
    							</a> --}}
                                                    <a href="{{ $file->file_name }}" target="_blank"
                                                        download="{{ $file_name }}.{{ $file->extension }}"
                                                        class="dropdown-item">
                                                        <i class="la la-download mr-2"></i>
                                                        <span>{{ __('Download') }}</span>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        onclick="copyUrl(this)" data-url="{{ $file->file_name }}">
                                                        <i class="las la-clipboard mr-2"></i>
                                                        <span>{{ __('Copy Link') }}</span>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item confirm-delete"
                                                        data-href="{{ route('uploaded-files.destroy', $file->id) }}"
                                                        data-target="#delete-modal">
                                                        <i class="las la-trash mr-2"></i>
                                                        <span>{{ __('Delete') }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card card-file dsj-uploader-select c-default"
                                                title="{{ $file_name }}.{{ $file->extension }}">
                                                <div class="card-file-thumb">
                                                    @if ($file->type == 'image')
                                                        <img src="{{ my_asset($file->file_name) }}"
                                                            class="img-fit img-responsive">
                                                    @elseif($file->type == 'video')
                                                        <i class="las la-file-video"></i>
                                                    @else
                                                        <i class="las la-file"></i>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="d-flex">
                                                        <span class="text-truncate title">{{ $file_name }}</span>
                                                        <span class="ext">.{{ $file->extension }}</span>
                                                    </h6>
                                                    <p>{{ formatBytes($file->file_size) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="dsj-pagination mt-3">
                                {{ $all_uploads->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                    <div id="delete-modal" class="modal fade">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title h6">{{ __('Delete Confirmation') }}</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p class="mt-1">{{ __('Are you sure to delete this file?') }}</p>
                                    <button type="button" class="btn btn-link mt-2"
                                        data-dismiss="modal">{{ __('Cancel') }}</button>
                                    <a href="" class="btn btn-primary mt-2" id="delete-link">{{ __('Delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="info-modal" class="modal fade">
                        <div class="modal-dialog modal-dialog-right">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h6">{{ __('File Info') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
                                    <div class="c-preloader text-center absolute-center">
                                        <i class="las la-spinner la-spin la-3x opacity-70"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
</x-admin-layout>
