@if (count($list_footer_menu1) > 0)
<div class="col l-3">
    <div class="widget__footer">
        <h2 class="widget__footer--title">Về DONGHO shop</h2>
        <ul class="widget__footer--list">
            @foreach ($list_footer_menu1 as $ft_mn1)
            <li class="widget__footer--items"><a href="{{$ft_mn1->link}}">{{$ft_mn1->name}}</a></li>
            @endforeach

        </ul>
    </div>
</div>
@endif

