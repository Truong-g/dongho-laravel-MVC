<div class="col l-8">
    <div class="product__onCate__rightBox">
        <div class="row">

            @foreach ($product_list as $product)

            <div class="col l-3">
                <div class="product__box">
                    <div class="product__image" style="background-image: url('{{asset('images/products/'.$product->img)}}')">
                        @if ($product->pricesale > 0)
                        <span class="product__set__sale">- {{sprintf("%.0f", $product->khuyenmai)}}%</span>
                        @endif
                    </div>
                    <div class="product__name">
                        <h4>{{$product->name}}</h4>
                    </div>
                    <div class="product__price">
                        <input type="hidden" value="{{$product->pricesale > 0 ? $product->pricesale : $product->price}}" class="get__price-to-cart" />
                        <div class="product__priceBox">
                            <span class="newPrice">
                                @if ($product->pricesale > 0)
                                    {{number_format($product->pricesale).'đ'}}
                                @else
                                    {{number_format($product->price).'đ'}}
                                @endif
                            </span>
                        </div>
                        @if ($product->pricesale > 0)
                        <div class="product__priceBox">
                            <span class="oldPrice">
                                {{number_format($product->price).'đ'}}
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="product__option">
                        <div class="option__view" onclick="location.href = '/{{$product->slug}}'">
                            <i class="fas fa-eye"></i>
                            <div class="handle__note">
                                <span>Xem chi tiết</span>
                            </div>
                        </div>
                        <div class="option__cart" onclick="addToCart({{$product->id}}, this.parentElement.parentElement)">
                            <i class="fas fa-cart-plus"></i>
                            <div class="handle__note">
                                <span>Thêm vào giỏ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="product__onCate__rightBox--seeAll">
            <div class="button--seeAll">
                <span onclick="location.href='{{route('site.slug', ['slug' => $catSlug])}}'">Xem Tất cả</span>
            </div>
        </div>
    </div>
</div>