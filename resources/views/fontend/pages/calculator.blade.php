@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')
    @include('fontend.component.inner_header', [
        'title' => 'CALCULATE TILES',
        'subtitle' => 'GET ASTIMATED IDEA ABOUT TILES',
        'bread' => 'Tiles Calculator',
        'image' => 'fontend/images/bg_header.jpg',
    ])

    <section class="sec-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="smart-forms bmargin">

                        <h3>Do you want to get measurements ?</h3>
                        <p>This will calculate and give you approx idea about your requirment for tiles.</p>
                        <br />
                        <br />
                        <table class="table table-bordered">

                            <tr>
                                <td>
                                </td>
                                <td>
                                    Height
                                </td>
                                <td>
                                    Width
                                </td>
                                <td>
                                    Number of Rooms
                                </td>
                                <td>
                                    Tiles Size
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Specify Size in Feet
                                </td>
                                <td>
                                    <input id="SLength" class="form-control" maxlength="3" name="SLength" size="4" />
                                </td>
                                <td> 
                                    <input id="SWidth" maxlength="3" class="form-control" name="SWidth" size="4" />
                                </td>
                                <td>
                                    <input id="NRooms" maxlength="3" class="form-control" name="NRooms" size="4" />
                                </td>
                                <td>
                                    <select id="sizes" class="form-control" name="sizes">
                                        <option selected="selected"  value="600 x 600">600 x 600mm</option>
                                        <option value="800 x 800">800 x 800mm</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    <input name="Button1" id="Button1" onclick="showResults('')" value="Calculate"
                                        type="button" class="button btn btn-sm btn-success dark" />
                                    <input name="Clear2" id="Clear" class="button btn btn-sm btn-danger dark" onclick="Clear('')" value="Clear" type="button" />
                                </td>
                            </tr>
                            <tr>
                                <th colspan="5" align="center">
                                    Calculations
                                </th>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    Total Area Covered
                                </td>
                                <td>
                                    <input maxlength="10" class="form-control" name="ar_mtr" id="ar_mtr" readonly="readonly" size="6">
                                    Sq. M
                                </td>
                                <td>
                                    <input id="ar_feet" maxlength="10" class="form-control" name="ar_feet" readonly="readonly" size="6" />
                                    Sq. Ft
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    Required Tiles
                                </td>
                                <td colspan="2">
                                    <input maxlength="10" name="TotalTiles" class="form-control" id="TotalTiles" readonly="readonly" size="10">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    Required Boxes
                                </td>
                                <td colspan="2">
                                    <input id="TotalBoxes" maxlength="10" class="form-control" name="TotalBoxes" readonly="readonly" size="10">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5"><b>Note :</b></td>

                            </tr>
                            <tr>
                                <td colspan="5">This may vary on basis of your actual need.</td>

                            </tr>
                            <tr>
                                <td colspan="5">This is only approx calculation.</td>
                            </tr>
                        </table>

                    </div>
                    <!-- end .smart-forms section -->
                </div>

{{-- 
                <div class="col-md-4">
                    <br />
                    <h4>Address Info</h4>
                    {!! config('app.address') !!}<br />
                    <br />
                    E-mail: <a href="mailto:{{config('app.email')}}">{{config('app.email')}}</a><br />
                    Website: <a href="{{config('app.website')}}">{{config('app.website')}}</a>
                    <div class="clearfix"></div>
                    <br /><br />
                    <h4>Find the Address</h4>

                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.816763718588!2d70.84901501496452!3d22.84626778504262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39598d19c20b154b%3A0xc943f7c873df9b28!2sBansiyi%20Overseas%20LLP!5e0!3m2!1sen!2sin!4v1650288370964!5m2!1sen!2sin"  style="border:0;" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div> --}}
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>
<div class="divider-line solid light"></div>
@section('js')
    <script type="text/javascript">
        function showHide(frm) {
            if (frm.isDoor(0).status == true) {
                document.getElementById("showExtras").style.display = "";
            } else {
                document.getElementById("showExtras").style.display = "none";
            }
        }

        function Clear() {
            document.getElementById("SLength").value = "";
            document.getElementById("SWidth").value = "";
            document.getElementById("NRooms").value = "";
            document.getElementById("ar_mtr").value = "";
            document.getElementById("ar_feet").value = "";
            document.getElementById("TotalTiles").value = "";
            document.getElementById("TotalBoxes").value = "";
        }

        function showResults(v1) {
            if (v1.length == 0) {

                if (document.getElementById("sizes").value == "Select Size" || document.getElementById("sizes").value
                    .length <= 0) {
                    alert("Select a size please");
                    return false;
                } else {
                    calculate();
                    document.getElementById("Results").style.display = "";
                }
            }

        }

        function calculate() {
            if (document.getElementById("sizes").value == "Select Size" || document.getElementById("sizes").value.length <=
                0) {
                alert("Select a size please");
                return false;
            }

            if (document.getElementById("SLength").value.length <= 0 || document.getElementById("SWidth").value.length <=
                0 || document.getElementById("NRooms").value.length <= 0) {
                alert("Enter a valid numeric value in Height/Width/Number of Room");
                return false;
            }


            var SLength = document.getElementById("SLength").value;
            var SWidth = document.getElementById("SWidth").value;
            var NRooms = document.getElementById("NRooms").value;
            document.getElementById("ar_feet").value = parseFloat(SLength) * parseFloat(SWidth) * parseFloat(NRooms);
            document.getElementById("ar_mtr").value = Math.round((parseFloat(SLength) * parseFloat(SWidth) * parseFloat(
                NRooms)) / (3.28 * 3.28), 3);
            var tileSize = document.getElementById("sizes").value;


            var tilesinbox
            tilesinbox = 0;

            if (tileSize == "600 x 600") {
                tilesinbox = 4;
            }
            if (tileSize == "800 x 800") {
                tilesinbox = 3;
            }


            if (tileSize.indexOf("mm") > 0) tileSize = tileSize.substr(0, tileSize.indexOf("mm"));
            tileCoords = tileSize.split("x");
            sLength = SLength * 304.8;
            sWidth = SWidth * 304.8;
            var doorSize, winSize;

            var TileArea = (parseFloat(sLength) * parseFloat(sWidth));

            xVal = tileCoords[0];
            yVal = tileCoords[1];

            var tileSize = (parseFloat(xVal) * parseFloat(yVal));
            var TotalTilesRequired = Math.round((TileArea / tileSize) * parseFloat(NRooms));
            if ((TotalTilesRequired - Math.round(TotalTilesRequired)) > 0)
                TotalTilesRequired = Math.round(TotalTilesRequired) + 1;
            else
                TotalTilesRequired = Math.round(TotalTilesRequired, 0);
            document.getElementById("TotalTiles").value = TotalTilesRequired;


            var boxcount = Math.round(TotalTilesRequired / tilesinbox);
            document.getElementById("TotalBoxes").value = boxcount;
        }
    </script>

@endsection
@endsection
