{{-- <section>
    <div class="header-inner two">
        <div class="inner text-center">
            <h4 class="title padding-1 text-white raleway uppercase animate-in" data-anim-type="fade-in-up"
                data-anim-delay="100">{{ $title }}</h4>
            <h5 class="text-white uppercase raleway animate-in" data-anim-type="fade-in-up" data-anim-delay="200">{{
                $subtitle }}</h5>
        </div>
        <div class="overlay bg-opacity-5"></div>
        <img src="{{ ($banner)??(asset($image)) }}" alt="" class="img-responsive" />
    </div>
</section>
<!-- end header inner -->

<section>
    <div class="pagenation-holder">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="uppercase">{!! $bread??$title !!}</h3>
                </div>
                <div class="col-md-6 text-right">
                    <div class="pagenation_links uppercase"><a href="{{route('site.home')}}">HOME</a><i> / </i> {!! $sub_bread??$bread??$title !!}</div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<div class="clearfix"></div> --}}
<!-- Start Breadcrumb
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed  padding-xl text-light"
    style="background-image: url({{ ($banner)??(asset($image)) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="slideInRight animated" data-wow-duration="900ms" data-wow-delay="0.52s">{!! $bread??$title !!}</h1>
                <ul class="slideInRight animated breadcrumb" data-wow-duration="1500ms" data-wow-delay="1s">
                    <li><a href="{{route('site.home')}}">Home</a></li>
                    <li class="active">{!! $sub_bread??$bread??$title !!}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
