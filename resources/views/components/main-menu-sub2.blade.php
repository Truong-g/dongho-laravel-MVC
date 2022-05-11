
 @if ($sub == false)
    
 <li class="menuchild__item">
    <a href="{{$row_menu->link}}" class="menuchild__item--link">{{$row_menu->name}}</a>
</li>

@else
    
<li class="menuchild__item">
    <a href="{{$row_menu->link}}" class="menuchild__item--link">{{$row_menu->name}} <i class="fas fa-chevron-right"></i></a>
    <div class="menuchild2__container">
        <ul class="menuchild2__list">
            @foreach ($list_menu_sub as $menusub)
                <li class="menuchild2__item">
                    <a href="{{$menusub->link}}" class="menuchild2__item--link">{{$menusub->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</li>

@endif