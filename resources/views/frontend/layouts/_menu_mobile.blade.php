
@foreach( $menus as $menu )
    @if ($loop->iteration==7)
        <li class="dropdown"><a href="#">{{__('More')}}</a>
            <ul class="dropdown-menu">
                @endif
                <li>
                    <a href="{{ route('categories.item', [ 'category_name' => $menu->name]) }}">{{ $menu->name }} </a>
                </li>
                @if ($loop->last)
            </ul>
        </li>
    @endif
@endforeach
