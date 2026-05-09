@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    @include('fontend.component.inner_header', [
        'title' => 'Gallery',
        'subtitle' => 'News and media about MTH Tiles',
        'image' => 'fontend/images/bg_header.jpg',
    ])



    <section class="sec-tpadding-2 section-light">

        <div class="demo-masonry">
            <div class="cbp-panel">
                <div id="grid-container" class="cbp">
                    @foreach ($gallery as $g)
                        <div class="cbp-item identity"> <a class="cbp-caption cbp-lightbox"
                                data-title="<b class='uppercase'>{{$g->title}}</b>  ( {{$g->description??'By '.site_settings('company_name')}} )" href="{{ ($g->type == 'image')?\App\Services\Helpers::uploaded_asset($g->image):$g->video_link }}">
                                <div class="cbp-caption-defaultWrap"> <img src="{{ \App\Services\Helpers::uploaded_asset($g->cover_image) }}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">{{$g->title}}</div>
                                            <div class="cbp-l-caption-desc">{{$g->description??'By '.site_settings('company_name')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
                </div>
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>

@endsection
