<div class="brand__container">
    <i class="far fa-gem"></i>
    <span>THƯƠNG HIỆU</span>
    <div class="brand__list">
        <ul>
            @foreach ($list_brand as $brand)
            <li class="brand__items">
                <a href="{{$brand->slug}}" class="brand__item--link">
                    <img src="{{asset('images/supplier/'.$brand->logo)}}" alt="{{$brand->name}}">
                    <p class="brand__name">{{$brand->name}}</p>
                </a>
            </li>
            @endforeach
            
        </ul>
    </div>
</div>