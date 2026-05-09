<div class="topbar more-padding fulldark pink topbar-padding">
    <div class="container">
        <div class="topbar-left-items">
            <ul class="toplist toppadding pull-left paddtop1">
                <li><a href="tel:{{ site_settings('phone',false) }}"><i class="fa fa-phone"></i> {{ site_settings('phone',false) }}</a></li>
                <li><a href="mailto:{{ site_settings('receive_email',false) }}"><i class="fa fa-envelope"></i> {{ site_settings('receive_email') }}</a></li>
            </ul>
        </div>
        <!--end left-->

        <div class="topbar-right-items pull-right">
            <ul class="toplist toppadding">
                <li><a href="{{ site_settings('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ site_settings('twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ site_settings('instagram_link') }}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{ site_settings('googleplus_link') }}"><i class="fa fa-google-plus"></i></a></li>
                <li class="last"><a href="{{ site_settings('linkedin_link') }}"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
