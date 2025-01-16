@foreach ($menus as $menu)
    @if ($menu->menu_publish)
        <li>
            @if ($menu->slug == 'photogallery')
                <a
                    href="{{ route($menu->slug) }}">{{ $menu->name }}
                </a>
            @else
                <a
                    href="{{ route('categories.item', ['category_name' => $menu->name]) }}">{{ $menu->name }}
                </a>
            @endif
        </li>
    @endif
@endforeach
