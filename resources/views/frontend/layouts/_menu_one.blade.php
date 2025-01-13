
@foreach($menus as $menu )
    @if($menu->menu_publish)
        <li>
            <a href="{{ route('categories.item', ['category_slug' => $menu->slug, 'category_name' => $menu->name]) }}">{{ $menu->name }} </a>
        </li>
    @endif
@endforeach
