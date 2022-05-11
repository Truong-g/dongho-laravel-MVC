<div class="salePd">
    <div class="grid wide">
        <div class="salePd__title">
            <h2>Hàng mới về</h2>
            <div class="salde__seeAll">
                <a href="/san-pham?sortby=moinhat" class="salde__seeAll-link">Xem tất cả</a>
            </div>
        </div>
    </div>
    <div class="salePd__container">
            <div class="product__container--sliderItems multiple-items" style="width: 1200px; margin: 0 auto;" >
                
                @foreach ($list_salePd as $salePd)
                <div class="product__box">
                    <div class="product__image" style="background-image: url('{{asset('images/products/'.$salePd->img)}}')">
                        @if ($salePd->pricesale > 0)
                        <span class="product__set__sale">- {{sprintf( "%.0f", $salePd->khuyenmai )}}%</span>
                        @endif
                    </div>
                    <div class="product__name">
                        <h4>{{$salePd->name}}</h4>
                    </div>
                    <div class="product__price">
                        <input type="hidden" value="{{$salePd->pricesale > 0 ? $salePd->pricesale : $salePd->price}}" class="get__price-to-cart" />
                        <div class="product__priceBox">
                            <span class="newPrice">
                                @if ($salePd->pricesale > 0)
                                    {{number_format($salePd->pricesale, 0).'đ'}}
                                @else
                                    {{number_format($salePd->price, 0).'đ'}}
                                @endif
                            </span>
                        </div>
                        @if ($salePd->pricesale > 0)
                        <div class="product__priceBox">
                            <span class="oldPrice">
                                {{number_format($salePd->price, 0).'đ'}}
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="product__option">
                        <div class="option__view" onclick="location.href = '/{{$salePd->slug}}'">
                            <i class="fas fa-eye"></i>
                            <div class="handle__note">
                                <span>Xem chi tiết</span>
                            </div>
                        </div>
                        <div class="option__cart" onclick="addToCart({{$salePd->id}}, this.parentElement.parentElement)">
                            <i class="fas fa-cart-plus"></i>
                            <div class="handle__note">
                                <span>Thêm vào giỏ</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                 @endforeach
            </div>
    </div>

</div>