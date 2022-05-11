@extends('layouts.site')
@section('title', 'Tìm kiếm')

@section('javascrift')
<script src = {{asset("js/contact.js")}}></script>
@endsection

@section('footer')
<footer class="footer">
    <div class="grid wide">
        <div class="row">
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Chính sách cửa hàng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Hỗ trợ online</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Bảo hành chính hãng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>

            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Hệ thống cửa hàng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items">Cơ sở 1: Trường Cao Đẳng Công Thương<a href=""></a></li>
                        <li class="widget__footer--items">Cơ sở 2: Tỉnh Ninh Thuận<a href=""></a></li>
                        <li class="widget__footer--items">Cơ sở 3: Quận 9, Tp HCM<a href=""></a></li>
                        <li class="widget__footer--items">Hotline mua hàng: <a href="tel:012345678">012345678</a></li>
                        <li class="widget__footer--items">Hotline bảo hành: <a href="tel:012345678">012345678</a></li>
                        <li class="widget__footer--items">Email hỗ trợ: <a href="mailto:dongho@gmail.com">dongho@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l-4">
                <div class="footer__social">
                    <a href="" class="footer__social--link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="col l-8">
                <div class="mail__footer--subcribe">
                    <form class="form" method="">
                        <div class="input__group">
                            <div class="input__editText">
                                <input type="text" placeholder="Nhập tên của bạn">
                                <input type="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="input__button" >
                                <button>Nhận tin <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="grid wide">
            <p>Bản quyền thuộc về <span>Nguyễn Tuấn Trường</span> | Mã số sinh viên <span>2119110097</span></p>
        </div>
    </div>
</footer>
@endsection



@section('maincontent')
<section class="search__container">
    <div class="bread__crumb">
        <div class="grid wide">
            <ul>
                <li>
                    <a href="{{route('site.home')}}" class="bread__crumb--link">Trang chủ</a>
                    <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                </li>
                <li><strong class="currentBreadcrumb">Tìm kiếm</strong></li>
            </ul>
        </div>
    </div>
    <div class="search__items--container">
        <div class="grid wide">
            <h3 class="search__container--title">Có {{count($list_products)}} kết quả tìm thấy</h3>
            <hr />
        </div>
        <div class="grid wide" style="padding: 10px 0">
            <div class="row">
                @foreach ($list_products as $product)
                    <div class="col l-2">
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
        </div>
        <div class="grid wide" style="padding: 10px 0">
            <div class="pagination__container">
                @if (count($list_products) > 0)
                    <span>{{ $list_products->links('vendor.pagination.default')}}</span>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection