<ul class="menu__container">

    @foreach ($list_menu as $menu)
    <x-main-menu-sub :menu="$menu"/>
    @endforeach

</ul>