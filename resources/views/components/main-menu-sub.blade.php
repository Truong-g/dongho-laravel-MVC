
@if ($sub == false)
<li class="menu__container--item {{ request()->path() == $row_menu->link ? "active" : "" }}">
    <a href="{{$row_menu->link}}" class="menu__container--item-link">
        <span class="menu__items--name">{{$row_menu->name}}</span>
    </a>
</li>
@else
<li class="menu__container--item {{ request()->path() == $row_menu->link ? "active" : "" }}">
    <a href="{{$row_menu->link}}" class="menu__container--item-link">
        <span class="menu__items--name">{{$row_menu->name}} <i class="fas fa-chevron-down"></i></span>
    </a>
    <div class="menuchild__container">
        <ul class="menuchild__list">
            @foreach ($list_menu_sub as $menusub)
                <x-main-menu-sub-2 :menusub="$menusub"/>
            @endforeach
        </ul>
    </div>
</li>
@endif

