<ol class="dd-list">
    @foreach ($menus as $menu)
        <li class="dd-item" data-id="{{ $menu->id }}" data-image="{{ $menu->image??0 }}" data-route="{{ $menu->route??0 }}" data-dropdown_type="{{ $menu->dropdown_type??1 }}" data-metatitle="{{ $menu->meta_title??$menu->title }}" data-metadescription="{{ $menu->meta_description??$menu->title }}" data-name="{{ $menu->title }}" data-slug="{{ $menu->slug }}"  data-url="{{ $menu->url }}"
            data-new="0" data-deleted="0">
            <div class="dd-handle">{{ $menu->title }}</div>
            <span class="button-delete btn btn-danger btn-xs pull-right" data-owner-id="{{ $menu->id }}">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <span class="button-edit btn btn-success btn-xs pull-right" data-owner-id="{{ $menu->id }}">
                <i class="fa fa-edit" aria-hidden="true"></i>
            </span>
            @php
                $m = \App\Models\Menu::where('parent', $menu->id)
                    ->orderBy('order_level')
                    ->get();
            @endphp
            @if ($m->count() > 0)
                @include('backend.pages.menu_list', ['menus' => $m])
            @endif
        </li>
    @endforeach
    <!--- Initial Menu Items --->
</ol>
