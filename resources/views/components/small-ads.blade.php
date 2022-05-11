<div class="three__banner--container">
    <div class="grid wide">
        <div class="row">
            @foreach ($list_smallads as $smallads)
            <div class="col l-4">
                <div class="bannerBox">
                    <a href="{{$smallads->url}}"><img src="{{asset('images/slider/'.$smallads->img)}}" alt="{{$smallads->name}}"></a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>