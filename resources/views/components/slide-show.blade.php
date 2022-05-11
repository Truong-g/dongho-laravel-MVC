<div class="slider__container">
    <div class="grid wide">
        <div class="slide__showBox">

            <div class="leftArrowBox"  onclick = "plusSlides(-1)">
                <span class="btn btnLeft"></span>
            </div>
            
            <div class="rightArrowBox" onclick="plusSlides(1)">
                <span class="btn btnRight"></span>
            </div>

            @foreach ($list_slider as $slider)

            <div class="imageHolders">
                <a href="{{$slider->url}}"><img src="{{asset("images/slider/".$slider->img)}}" alt=""></a>
            </div>

            @endforeach
        </div>

        <div class="dotsContainer">
            
        </div>
    </div>
</div>
