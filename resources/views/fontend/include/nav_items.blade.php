    @foreach ($menus as $menu)
        @php
            $sub_menus = \App\Models\Menu::where('parent', $menu->id)->get();

            $url = route('site.home');
            if($sub_menus->count() > 0){
                $url = '#';
            }
            else if ($menu->slug != '' || $menu->slug != null) {
                $url = url($menu->slug);
            } else if ($menu->url != '' || $menu->url != null) {
                $url = $menu->url;
            } else {
                $url = route('site.home');
            }
        @endphp
        @if ($menu->dropdown_type == '2' && $sub_menus->count() > 0)
            <li class="dropdown"> <a href="{{ $url }}"
                    class="dropdown-toggle {{ request()->url() == $url ? 'active' : '' }}">{{ $menu->title }}</a>
                <ul class="dropdown-menu">

                    @include('fontend.include.nav_items', ['menus' => $sub_menus])
                </ul>
            </li>
        @elseif($menu->dropdown_type == 1 && $sub_menus->count() > 0)
            <li class="dropdown yamm-fw"> <a href="{{ $url }}"
                    class="dropdown-toggle {{ request()->url() == $url ? 'active' : '' }}">{{ $menu->title }}</a>
                <ul class="dropdown-menu">
                    <li class="grid-demo">
                        <div class="row">
                            @include('fontend.include.nav_items2', ['menus' => $sub_menus])
                        </div>
                    </li>
                </ul>
            </li>
        @else
            <li> <a href="{{ $url }}"
                    class="dropdown-toggle {{ request()->url() == $url ? 'active' : '' }}">{{ $menu->title }}</a>
            </li>
        @endif
    @endforeach
    <!--- Initial Menu Items --->
