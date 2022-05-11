
@if (count($list_footer_menu3) > 0)
<div class="col l-3">
    <div class="widget__footer">
        <h2 class="widget__footer--title">Thương hiệu nổi tiếng</h2>
        <ul class="widget__footer--list--tag">
            @foreach($list_footer_menu3 as $i => $ft_mn3)

                @if ($i%2==0)
                <li class="widget__footer--items" style="background-color: #ebebeb"><a style="color: #666" href="{{$ft_mn3->link}}">{{$ft_mn3->name}}</a></li>
                @else
                <li class="widget__footer--items" style="background-color: #bbbbbb"><a style="color: #666" href="{{$ft_mn3->link}}">{{$ft_mn3->name}}</a></li>
                @endif
            @endforeach
            
        </ul>
    </div>
</div>
@endif
