@extends('layouts.site')
@section('title', $supplier->name)
@section('javascrift')
<script type="text/javascript">

</script>
@endsection
@section('footer')
    
        <footer class="footer">
            <div class="grid wide">
                <div class="row">
                    
                    <x-footer-menu1 />
                    
                    <x-footer-menu2 />

                    <x-footer-menu3 />

                    <div class="col l-3">
                        <div class="widget__footer">
                            <h2 class="widget__footer--title">Hệ thống cửa hàng</h2>
                            <ul class="widget__footer--list">
                                <li class="widget__footer--items">Cơ sở 1: Phan Rang - Tháp Chàm<a href=""></a></li>
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
                    
                    <x-footer-menu4 />

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
    
    <section class="all__product">
        <div class="bread__crumb">
            <div class="grid wide">
                <ul>
                    <li>
                        <a href="{{url('/')}}" class="bread__crumb--link">Trang chủ</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li>
                        <a href="{{url('/san-pham')}}" class="bread__crumb--link">Sản phẩm</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li><strong class="currentBreadcrumb">{{$supplier->name}}</strong></li>
                </ul>
            </div>
        </div>
        <div class="product__container">
            <div class="grid wide">
                <div class="product__container-all">
                    <div class="row no-gutters">
                        <div class="col l-3 product__container-setborderRight">
                            <div class="product__container--left">
                                <div class="product__filter">
                                    <div class="product__filter--box">
                                        <h2 class="product__filter--name">
                                            <span>Danh mục sản phẩm</span>
                                        </h2>
                                        <ul class="product__filter--list">

                                            @foreach ($list_category as $cate)
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="{{$cate->slug}}">{{$cate->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="product__filter">
                                    <div class="product__filter--box">
                                        <h2 class="product__filter--name">
                                            <span>Lọc theo giá</span>
                                        </h2>
                                        <ul class="product__filter--list">

                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:duoi500000vnd">Dưới 500.000</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:500000vnd_1000000vnd">Từ 500.000 đến 1 triệu</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:1000000vnd_3000000vnd">Từ 1 triệu đến 3 triệu</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:3000000vnd_6000000vnd">Từ 3 triệu đến 6 triệu</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:6000000vnd_9000000vnd">Từ 6 triệu đến 9 triệu</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:9000000vnd_15000000vnd">Từ 9 triệu đến 15 triệu</a>
                                                </li>
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="?sortby=gia:tren15000000vnd">Trên 15 triệu</a>
                                                </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="product__filter">
                                    <div class="product__filter--box">
                                        <h2 class="product__filter--name">
                                            <span>Thương hiệu</span>
                                        </h2>
                                        <ul class="product__filter--list">

                                            @foreach ($list_supplier as $supp)
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="{{$supp->slug}}">{{$supp->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l-9">
                            <div class="product__container--right">
                                <h2 class="product__container--right-title">{{$supplier->name}}</h2>
                                <div class="product__order--box">
                                    <p class="product__order--text">Sắp xếp: </p>
                                    <ul class="product__order--list">
                                        <li class="product__order--items"><a href="" class="product__order--items-link">Từ A -> Z</a></li>
                                        <li class="product__order--items"><a href="" class="product__order--items-link">Từ Z -> A</a></li>
                                        <li class="product__order--items"><a href="" class="product__order--items-link">Giá giảm dần</a></li>
                                        <li class="product__order--items"><a href="" class="product__order--items-link">Giá tăng dần</a></li>
                                        <li class="product__order--items"><a href="" class="product__order--items-link">Hàng mới</a></li>
                                    </ul>
                                </div>
                                <div class="product__show--all">
                                    <div class="grid">
                                        @if (count($list_product_supp) > 0)
                                            
                                        <div class="row" style="flex-wrap: wrap;">
                                            @foreach ($list_product_supp as $product_supp)

                                            <div class="col l-3" style="padding-left: 12px; padding-right: 12px; margin: 12px 0;">
                                                <div class="product__box">
                                                    <div class="product__image" style="background-image: url('{{asset('images/products/'.$product_supp->img)}}')">
                                                        @if ($product_supp->pricesale > 0)
                                                        <span class="product__set__sale">- {{sprintf( "%.0f", $product_supp->khuyenmai )}}%</span>
                                                        @endif
                                                    </div>
                                                    <div class="product__name">
                                                        <h4>{{$product_supp->productname}}</h4>
                                                    </div>
                                                    <div class="product__price">
                                                        <div class="product__priceBox">
                                                            <input type="hidden" value="{{$product_supp->pricesale > 0 ? $product_supp->pricesale : $product_supp->price}}" class="get__price-to-cart" />
                                                            <span class="newPrice">
                                                                @if ($product_supp->pricesale > 0)
                                                                    {{number_format($product_supp->pricesale, 0).'đ'}}
                                                                @else
                                                                    {{number_format($product_supp->price, 0).'đ'}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        @if ($product_supp->pricesale > 0)
                                                        <div class="product__priceBox">
                                                            <span class="oldPrice">
                                                                {{number_format($product_supp->price, 0).'đ'}}
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="product__option">
                                                        <div class="option__view" onclick="location.href ='/{{$product_supp->productslug}}'">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="handle__note">
                                                                <span>Xem chi tiết</span>
                                                            </div>
                                                        </div>
                                                        <div class="option__cart" onclick="addToCart({{$product_supp->productid}}, this.parentElement.parentElement)">
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

                                        @else
                                            <p class="empty__items--confirmNumber">Không có sản phẩm nào</p>
                                        @endif
                                        
                                    </div>
                                </div>
    
                                
                            </div>
                        </div>
                    </div>
                    <div class="pagination__container">
                        <span>{{ $list_product_supp->links('vendor.pagination.default')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection