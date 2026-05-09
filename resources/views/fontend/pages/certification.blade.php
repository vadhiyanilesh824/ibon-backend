@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    @include('fontend.component.inner_header', [
        'title' => 'CERTIFICATION',
        'subtitle' => 'MTH Certified with ANSI',
        'bread' => 'CERTIFICATION',
        'sub_bread' => 'CERTIFICATION',
        'image' => 'fontend/images/bg_header.jpg',
    ])

{{-- 
    <section class="section-light section-side-image clearfix">
        <div class="img-holder col-md-offset-5 col-sm-offset-4  col-md-7 col-sm-3 pull-right">
            <div class="background-imgholder animate-in" data-anim-type="fade-in"
                style="background:url({{ asset('fontend/images/ceti.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('fontend/images/ceti.jpg') }}" alt="" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7  col-sm-8 text-inner clearfix align-left">
                    <div class="text-box white padding-7 animate-in" data-anim-type="fade-in-left">
                        <div class="col-xs-12 text-left">
                            <h6 class="nopadding lspace-1">MTH Certified with</h6>
                            <h1 class="paddtop1 dosis font-weight-5 lspace-sm"><span class="text-orange-2">ANSI</span>
                            </h1>
                            <div class="title-line-4"></div>
                        </div>


                        <p>MTH Ceramics manufactures ceramic tiles according to the latest version of <span
                                class="text-orange">ANSI A137.1
                                American national standard specifications</span> for ceramics tiles - 2021, Reference
                            Standards ASTM
                            (C499, C485, C502, C1027, C482, C373, C609, C424, C650, C1378, C648, C1026, ANSI A326.3) with
                            latest edition, It is tested by IAS Accredited Testing Laboratory ISO 17025,</p>
                        <p>ANSI standards for ceramic, glass, stone, and other hard surface tiles and panels, tile
                            installation materials, and tile installation requirements are available from TCNA.</p>
                        <br />
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--end section-->
    <div class="clearfix"></div>
    <section class="sec-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="text-box border padding-3">
                        <img src="{{asset('fontend/images/cert_Overseas11.png')}}" alt="" class="img-responsive">
                    </div>
                </div>
                <!--end item-->


                <div class="col-md-6">
                    <div class="text-box border padding-3">
                        <img src="{{asset('fontend/images/cert_Overseas22.png')}}" alt="" class="img-responsive">
                    </div>
                </div>
                <!--end item-->
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection
