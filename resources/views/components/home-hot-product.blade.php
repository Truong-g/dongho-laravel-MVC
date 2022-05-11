<div class="col l-4">
    <div class="product__onCate__leftBox watchMan">
        <div class="product__onCate__leftBox-header">
            <h2>Sản phẩm sale mạnh</h2>
        </div>
        <div class="product__onCate__leftBox-img" style="background-image: url('images/products/{{$hot_product->img}}')">
            <span class="hot__product--sale">- {{sprintf("%.0f",$hot_product->khuyenmai)}}%</span>            
        </div>
        <div class="product__onCate__leftBox-name">
            <h4 onclick="location.href = '/{{$hot_product->slug}}'">{{$hot_product->name}} </h4>
        </div>
        <div class="product__onCate__leftBox-price">
            <span class="product__onCate__leftBox-newPrice">{{number_format($hot_product->pricesale)}}đ</span>
            <span class="product__onCate__leftBox-oldPrice">{{number_format($hot_product->price)}}đ</span>
        </div>
        <div class="product__onCate__leftBox-processNumber">
            @if ($hot_product->quantity > 0)
            <span>Tình trạng: <strong>Còn hàng</strong></span>
            @else
            <span>Tình trạng: <strong>Hết hàng</strong></span>
            @endif
        </div>
        <div class="product__onCate__leftBox-countdown">
            <div class="countdown__product--confirm">
                <span>Hãy nhanh chân! Thời gian chỉ còn:</span>
            </div>
            <div class="countdown__product--time">
                <div class="row no-gutters">
                    <div class="col l-3 box__timecount init--day">
                        <div class="time--num"><span class="manTime"></span></div>
                        <div class="time--name"><span>Ngày</span></div>
                    </div>
                    <div class="col l-3 box__timecount init--hour">
                        <div class="time--num"><span class="manTime"></span></div>
                        <div class="time--name"><span>Giờ</span></div>
                    </div>
                    <div class="col l-3 box__timecount init--minute">
                        <div class="time--num"><span class="manTime"></span></div>
                        <div class="time--name"><span>Phút</span></div>
                    </div>
                    <div class="col l-3 box__timecount init--second">
                        <div class="time--num"><span class="manTime"></span></div>
                        <div class="time--name"><span>Giây</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>