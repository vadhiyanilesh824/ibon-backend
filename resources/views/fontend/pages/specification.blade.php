@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('css')
<style>
    @media only screen and (max-width: 479px) {
        table td:first-child {
            background: lightgray;
        }
    }

    table {
        width: 100% !important;
    }

    td,
    th,
    p {
        text-align: left !important;

    }

</style>
@endsection
@section('content')
@include('fontend.component.inner_header', [
'title' => 'Packings & Specifications Guide',
'subtitle' => 'Detailed Information about Packings & Specifications',
'bread' => 'Packings & Specifications',
'image' => 'fontend/images/bg_header.jpg',
])

<section class="sec-padding">
    @foreach ($category as $cat)
    <div class="container">

        <div class="bmargin animate-in" data-anim-type="fade-in-left" data-anim-delay="100">
            <h3 class="dosis uppercase">{{ $cat->name }}</h3>
            <div class="title-line-4 green"></div>
            <br />
            {!! $cat->specification !!}
            <br />
            <br />

        </div>
        <!--end item-->


    </div>
    @endforeach
</section>
<!-- end section -->
<div class="clearfix"></div>
<div class="clearfix margin-bottom bottom-margin"></div>

<div class="divider-line solid light"></div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(document).find('table').addClass('table table-bordered');
        $(document).find('table td').removeAttr('style');
        $(document).find('table tr').removeAttr('style');
        $(document).find('table th').removeAttr('style');
        $(document).find('table').css('width', '100%');
        $(document).find('table th').css('text-align', 'left');
        $(document).find('table td').css('text-align', 'left');
        $(document).find('colgroup').remove();
    }); //closing our doc ready

</script>
@endsection
