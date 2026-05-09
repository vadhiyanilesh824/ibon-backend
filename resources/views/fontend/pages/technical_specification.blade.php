@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')

@include('fontend.component.inner_header', [
        'title' => 'Technical Specification',
        'subtitle' => 'BEAUTIFUL COLLECTIONS OF ITEMS',
        'image' => 'assets/img/technical_specifications.png',
    ])
{{-- <div class="breadcrumb-area shadow dark bg-fixed  padding-xl text-light" style="background-image: url({{ asset('assets/img/technical_specifications.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Technical Specification</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Technical Specification</li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}

<section class="faq-pg-section default-padding    ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="col-lg-8 col-md-8">
                    <div class="section-title-s3 wow slideInLeft    animated" data-wow-duration="1500ms" data-wow-delay="0.52s" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.52s; animation-name: slideInLeft;">
                        <span>Digital Wall Tiles Technical Details</span>
                        <h2>600 x 600 MM.</h2>
                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>CHARACTERISTICS</th>
                                    <th style="text-align:center;">EURO STANDARD EN-159/IS 13753</th>
                                    <th style="text-align:center;">MOZZECO VALUE</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">DIMENSION &amp; SURFACE QUALITY</th>
                                </tr>
                                <tr>
                                    <td>Dimension &amp; Surface Quality</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.4%</td>
                                </tr>
                                <tr>
                                    <td>Deviation in Thickness</td>
                                    <td style="text-align:center;">± 0.6mm</td>
                                    <td style="text-align:center;">± 0.3mm</td>
                                </tr>
                                <tr>
                                    <td>Straightness of sides</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                    <td style="text-align:center;">± 0.2%</td>
                                </tr>
                                <tr>
                                    <td>Rectangularity</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                </tr>
                                <tr>
                                    <td>Surface Flatness</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                </tr>
                                <tr>
                                    <td>Surface Quality</td>
                                    <td style="text-align:center;">Min 95%</td>
                                    <td style="text-align:center;">Min 96%</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">PHYSICAL PROPERTIES</th>
                                </tr>
                                <tr>
                                    <td>Water Absorption </td>
                                    <td style="text-align:center;">&gt;10%</td>
                                    <td style="text-align:center;">12-15%</td>
                                </tr>
                                <tr>
                                    <td>Bending Strength</td>
                                    <td style="text-align:center;">&gt; 150 Kg/Cm<sup>2</sup></td>
                                    <td style="text-align:center;">150-180 Kg/Cm<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Scratch hardness (Mohs)</td>
                                    <td style="text-align:center;">Min 3</td>
                                    <td style="text-align:center;">Min 3</td>
                                </tr>
                                <tr>
                                    <td>Crazing</td>
                                    <td style="text-align:center;">1 cycle</td>
                                    <td style="text-align:center;">No Crazing at 4 Cycles</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">CHEMICAL PROPERTIES
                                    </th>
                                </tr>
                                <tr>
                                    <td>Staining Resistance</td>
                                    <td style="text-align:center;">Min Class 2</td>
                                    <td style="text-align:center;">Resistance to all Acids, Alkalies &amp; Household
                                        <br>Chemicals, except Hydro Fluoric Acid
                                    </td>
                                </tr>
                                <tr>
                                    <td>Household Chemical</td>
                                    <td style="text-align:center;">Min Class B</td>
                                    <td style="text-align:center;">Resistance to all Acids, Alkalies &amp; Household
                                        <br>Chemicals, except Hydro Fluoric Acid
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">THERMAL PROPERTIES</th>
                                </tr>
                                <tr>
                                    <td>Thermal Shock</td>
                                    <td style="text-align:center;">Resistant to 10 Cycles</td>
                                    <td style="text-align:center;">CONFORMS</td>
                                </tr>
                                <tr>
                                    <td>Thermal Expansion</td>
                                    <td style="text-align:center;">Max-9E-06</td>
                                    <td style="text-align:center;">CONFORMS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8" style="margin-top:50px;">
                    <div class="section-title-s3 wow slideInLeft    animated" data-wow-duration="1500ms" data-wow-delay="0.52s" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.52s; animation-name: slideInLeft;">
                        <span>Digital Wall Tiles Technical Details</span>
                        <h2>600 x 1200 MM.</h2>
                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>CHARACTERISTICS</th>
                                    <th style="text-align:center;">EURO STANDARD EN-159/IS 13753</th>
                                    <th style="text-align:center;">MOZZECO VALUE</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">DIMENSION &amp; SURFACE QUALITY</th>
                                </tr>
                                <tr>
                                    <td>Dimension &amp; Surface Quality</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.4%</td>
                                </tr>
                                <tr>
                                    <td>Deviation in Thickness</td>
                                    <td style="text-align:center;">± 0.6mm</td>
                                    <td style="text-align:center;">± 0.3mm</td>
                                </tr>
                                <tr>
                                    <td>Straightness of sides</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                    <td style="text-align:center;">± 0.2%</td>
                                </tr>
                                <tr>
                                    <td>Rectangularity</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                </tr>
                                <tr>
                                    <td>Surface Flatness</td>
                                    <td style="text-align:center;">± 0.5%</td>
                                    <td style="text-align:center;">± 0.3%</td>
                                </tr>
                                <tr>
                                    <td>Surface Quality</td>
                                    <td style="text-align:center;">Min 95%</td>
                                    <td style="text-align:center;">Min 96%</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">PHYSICAL PROPERTIES</th>
                                </tr>
                                <tr>
                                    <td>Water Absorption </td>
                                    <td style="text-align:center;">&gt;10%</td>
                                    <td style="text-align:center;">12-15%</td>
                                </tr>
                                <tr>
                                    <td>Bending Strength</td>
                                    <td style="text-align:center;">&gt; 150 Kg/Cm<sup>2</sup></td>
                                    <td style="text-align:center;">150-180 Kg/Cm<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Scratch hardness (Mohs)</td>
                                    <td style="text-align:center;">Min 3</td>
                                    <td style="text-align:center;">Min 3</td>
                                </tr>
                                <tr>
                                    <td>Crazing</td>
                                    <td style="text-align:center;">1 cycle</td>
                                    <td style="text-align:center;">No Crazing at 4 Cycles</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">CHEMICAL PROPERTIES
                                    </th>
                                </tr>
                                <tr>
                                    <td>Staining Resistance</td>
                                    <td style="text-align:center;">Min Class 2</td>
                                    <td style="text-align:center;">Resistance to all Acids, Alkalies &amp; Household
                                        <br>Chemicals, except Hydro Fluoric Acid
                                    </td>
                                </tr>
                                <tr>
                                    <td>Household Chemical</td>
                                    <td style="text-align:center;">Min Class B</td>
                                    <td style="text-align:center;">Resistance to all Acids, Alkalies &amp; Household
                                        <br>Chemicals, except Hydro Fluoric Acid
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align:center;">THERMAL PROPERTIES</th>
                                </tr>
                                <tr>
                                    <td>Thermal Shock</td>
                                    <td style="text-align:center;">Resistant to 10 Cycles</td>
                                    <td style="text-align:center;">CONFORMS</td>
                                </tr>
                                <tr>
                                    <td>Thermal Expansion</td>
                                    <td style="text-align:center;">Max-9E-06</td>
                                    <td style="text-align:center;">CONFORMS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="blog-sidebar">
                    <div class="widget categories-widget">
                        <h3>Available Size</h3>
                        <ul>
                            <li class="wow slideInRight    animated" data-wow-duration="1500ms" data-wow-delay="0.52s" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.52s; animation-name: slideInRight;">
                                <a href="#">600 x 600 MM</a>
                            </li>
                            <li class="wow slideInRight    animated" data-wow-duration="2000ms" data-wow-delay="0.62s" style="visibility: visible; animation-duration: 2000ms; animation-delay: 0.62s; animation-name: slideInRight;">
                                <a href="#">600 x 1200 MM</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget tag-widget">
                        <h3>Product Keywords</h3>
                        <div class="tagcloud">
                            <a href="#">Digital Wall Tiles</a>
                            <a href="#">Manufacturer of Wall Tiles</a>
                            <a href="#">Ceramic Wall Tiles</a>
                            <a href="#">300x450mm Wall Tiles</a>
                            <a href="#">300x600mm Wall Tiles</a>
                            <a href="#">Exterior Tiles</a>
                            <a href="#">Bathroom Tiles</a>
                            <a href="#">Kitchen Tiles</a>
                            <a href="#">Artistic Tiles</a>
                            <a href="#">Best Quality Wall Tiles</a>
                            <a href="#">Waterproof Wall Tiles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
