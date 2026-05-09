@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('fontend/js/smart-forms/smart-forms.css') }}">
    <style>
        th,
        td,
        tr {
            border: none !important;
            vertical-align: middle !important;

        }

        .we-offer-area .item i {
            color: #ff5700;
            display: inline-block;
            font-size: 14px;
            margin-bottom: 0px;
        }
    </style>
@endsection
@section('content')
    @include('fontend.component.inner_header', [
        'title' => 'Dealers',
        'subtitle' => 'BEAUTIFUL COLLECTIONS OF ITEMS',
        'image' => 'assets/img/Dealers.jpg',
    ])

    <section class="">
        <div id="features" class="we-offer-area carousel-shadow item-border-less  default-padding bottom-less bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-heading text-left">
                            <h2>OUR <span>Dealers</span></h2>
                            <h4>Fine our dealers in your area</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="our-offer-items less-carousel">
                        <!-- Single Item -->
                        @foreach (\App\Models\DealerInquiry::where('is_approved', 1)->get() as $key => $di)
                            <div class="col-md-4 equal-height">
                                <div class="item ">
                                    {{-- <span class="number">{{ $key + 1 }}</span> --}}
                                    <h4>{{ $di->company_name }}</h4>
                                    <table class="table table-borderless mb-0">

                                        <tr>
                                            <th>
                                                <i class="fas fa-user"></i>
                                            </th>
                                            <td>
                                                <p>{{ $di->name }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fas fa-phone"></i>
                                            </th>
                                            <td>
                                                <p>{{ $di->phone }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fas fa-map-marked-alt"></i>
                                            </th>
                                            <td>
                                                <p>{{ $di->address }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fas fa-map-marker-alt"></i>
                                            </th>
                                            <td>
                                                <p>{{ $di->city }}, {{ $di->state }}, {{ $di->country }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- <div id="blog" class="blog-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading text-left">
                        <h2>OUR <span>Dealers</span></h2>
                        <h4>Fine our dealers in your area</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="blog-items">
                        @foreach (\App\Models\DealerInquiry::where('is_approved', 1)->get() as $di)
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="info">
                                        <h4>
                                            <a href="single.html">{{ $di->company_name }}</a>
                                        </h4>
                                        
                                        <table class="table table-borderless mb-0">

                                            <tr>
                                                <th>
                                                    <i class="fas fa-user"></i>
                                                </th>
                                                <td>
                                                    {{ $di->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-phone"></i>
                                                </th>
                                                <td>
                                                    {{ $di->phone }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </th>
                                                <td>
                                                    {{ $di->address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </th>
                                                <td>
                                                    {{ $di->city }}, {{ $di->state }}, {{ $di->country }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="info">
                                        <h4>
                                            <a href="single.html">{{ $di->company_name }}</a>
                                        </h4>
                                        <table class="table table-borderless mb-0">

                                            <tr>
                                                <th>
                                                    <i class="fas fa-user"></i>
                                                </th>
                                                <td>
                                                    {{ $di->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-phone"></i>
                                                </th>
                                                <td>
                                                    {{ $di->phone }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </th>
                                                <td>
                                                    {{ $di->address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </th>
                                                <td>
                                                    {{ $di->city }}, {{ $di->state }}, {{ $di->country }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Blog -->
    <div class="clearfix"></div>

@section('js')


@endsection

@endsection
