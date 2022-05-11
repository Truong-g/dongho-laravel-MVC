@if (count($list_footer_menu2) > 0)
    
<div class="col l-3">
    <div class="widget__footer">
        <h2 class="widget__footer--title">Các danh mục</h2>
        <ul class="widget__footer--list">
            @foreach ($list_footer_menu2 as $ft_mn2)
            <li class="widget__footer--items"><a href="/{{$ft_mn2->link}}">{{$ft_mn2->name}}</a></li>
            @endforeach
            
        </ul>
    </div>
</div>

@endif

