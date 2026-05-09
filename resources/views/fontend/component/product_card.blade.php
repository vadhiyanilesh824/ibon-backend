@foreach ($product as $p)
<div class="col-md-3 col-sm-6 col-xs-6 bmargin animate-in" data-anim-type="fade-in">
    <div class="shop-product-holder">
        <a href="product-details.html">
            <div class="image-holder">
                <div class="hoverbox"><i class="fa fa-link"></i></div>
                <img src="{{ \App\Services\Helpers::uploaded_asset($p->thumbnail_img) }}" alt=""
                    class="img-responsive" />
            </div>
        </a>
    </div>
    <div class="clearfix"></div>
    <br />
    <h5 class="less-mar1 roboto-slab"><a href="index.html">{{ $p->name }}</a></h5>
    {!! $p->description !!}
</div>
@endforeach