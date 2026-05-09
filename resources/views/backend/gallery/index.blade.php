@push('css')
    @include('admin_template.theme.datatable_css')
@endpush
@push('js')
    @include('admin_template.theme.datatable_js')
@endpush
@include('admin.uploader.uploader-script')
<x-admin-layout page-title="{{ __('Gallery') }}" page-description="">
    @section('breadcrumb')
        <x-breadcrumb :breadcrumbs="@[['title' => __('Gallery'), 'url' => '#']]"></x-breadcrumb>
    @endsection
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('gallery.create') }}"
                        class="btn btn-primary btn-xs float-right">{{ __('Add') }}</a>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div>
                            <div>
                                <div class="row gutters-5">
                                    @foreach ($gallery as $key => $file)
                                        <div class="col-auto w-140px w-lg-220px col-md-3 col-xs-2">
                                            <div class="card mb-2">
                                                <img class="card-img-top"
                                                    src="{{ \App\Services\Helpers::uploaded_asset($file->cover_image) }}"
                                                    alt="Dist Photo 1">
                                                <div class="card-body">
                                                    <span class="text-truncate title">{{$file->title}}</span>
                                                    <div class="text-right">
                                                        <x-action-buttons :actions="@[
                                                            [
                                                                'title' => __('Edit'),
                                                                'link' => route('gallery.create', $file->id),
                                                            ],
                                                            [
                                                                'title' => __('Delete'),
                                                                'link' => route('gallery.destroy', $file->id),
                                                                'post' => true,
                                                            ],
                                                        ]" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($gallery->lastPage() > 1)
                                    <ul class="pagination float-right">
                                        @if (!($gallery->currentPage() == 1 || $gallery->currentPage() == 0))
                                            <li
                                                class="page-item  {{ $gallery->currentPage() == 1 ? ' disabled' : '' }}">
                                                <a class="page-link" href="{{ $gallery->url(1) }}"><i
                                                        class="fa fa-angle-left"></i></a>
                                            </li>
                                        @endif
                                        @for ($i = 1; $i <= $gallery->lastPage(); $i++)
                                            <?php
                                            $half_total_links = floor($gallery->lastPage() + 1 / 2);
                                            $from = $gallery->currentPage() - $half_total_links;
                                            $to = $gallery->currentPage() + $half_total_links;
                                            if ($gallery->currentPage() < $half_total_links) {
                                                $to += $half_total_links - $gallery->currentPage();
                                            }
                                            if ($gallery->lastPage() - $gallery->currentPage() < $half_total_links) {
                                                $from -= $half_total_links - ($gallery->lastPage() - $gallery->currentPage()) - 1;
                                            }
                                            ?>
                                            @if ($from < $i && $i < $to)
                                                <li
                                                    class="page-item {{ $gallery->currentPage() == $i ? ' active' : '' }}">
                                                    <a class="page-link  {{ $gallery->currentPage() == $i ? ' active' : '' }}"
                                                        href="{{ $gallery->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endif
                                        @endfor
                                        @if (!($gallery->currentPage() == $gallery->lastPage()))
                                            <li
                                                class="page-item  {{ $gallery->currentPage() == $gallery->lastPage() ? ' disabled' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $gallery->url($gallery->lastPage()) }}"><i
                                                        class="fa fa-angle-right"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                                {{-- <div class="pagination mt-3">
                                    {{ $gallery->render() }}
                                </div> --}}
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
                                        <a href="" class="btn btn-primary mt-2"
                                            id="delete-link">{{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
                integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
                async></script>
        <script>
            function change_section(event) {

                if ($(event).is(":checked")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('catalogue.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 1,
                        },
                        success: function(data) {
                            if (data.success == 0) {
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
                        url: "{{ route('catalogue.change_section') }}",
                        data: {
                            id: $(event).attr('data-id'),
                            name: $(event).attr('name'),
                            status: 0,
                        },
                        success: function(data) {
                            if (data.success == 0) {
                                $(event).attr("checked", "checked");
                            }
                        }
                    });
                }
            }
        </script>
    @endsection

</x-admin-layout>
