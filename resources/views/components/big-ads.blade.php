@if ($list_bigads)

<div class="banner__single--container">
    <div class="grid wide">
        <div class="bannerBox bannerSingle">
            <a href=""><img src="{{asset('images/slider/'.$list_bigads->img)}}" alt="{{$list_bigads->url}}"></a>
        </div>
    </div>
</div>
    
@endif

