    @foreach ($menus as $menu)
        @php
            $url = route('site.home');
            if ($menu->url != '' || $menu->url != null) {
                $url = $menu->url;
            } elseif ($menu->slug != '' || $menu->slug != null) {
                $url = url($menu->slug);
            } else {
                $url = route('site.home');
            }
        @endphp

        <ul class="col-sm-6 col-md-4 list-unstyled ">
            <li>
                <a href="{{ $url }}"> {{ $menu->title }}</a>
            </li>
            <li><a href="{{ $url }}">
                    <div
                        style="height: 160px; width: 100%; background-image: url({{ \App\Services\Helpers::uploaded_asset($menu->image) }}); background-repeat: no-repeat; background-position: center; background-size: cover; ">
                    </div>
                </a>
            </li>
        </ul>
    @endforeach
    <!--- Initial Menu Items --->
