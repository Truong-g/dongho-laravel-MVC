@extends('layouts.site')
@section('title', 'Tất cả sản phẩm')


@section('javascript')
    <script type="text/javascript">

    const boxLoading = document.querySelector('.pagination__container')
    const productList = document.querySelector('.render__product--items')
    const loadingSvg = document.querySelector('.loader.loader--style1')
    const heightWindow =  window.innerHeight
    var _token = '{{csrf_token()}}';
    let start = 0
    let limit = 12
    let show = false
    
    function loadProducts(start, limit){
        $.ajax({
            url: "{{route('ajax.products')}}",
            method: "POST",
            data:{limit: limit, start: start, _token: _token},
            cache: false,
            success: function(data){
                if(data.length == 0){
                    boxLoading.innerHTML = ''
                    boxLoading.innerHTML = '<span class="ran-out-off-product">Hết sản phẩm</span>'
                }else{
                    const htmls = data.map(items => {
                        return `<div class="col l-3" style="padding-left: 12px; padding-right: 12px; margin: 12px 0;">
                                    <div class="product__box">
                                        <div class="product__image" style="background-image: url('http://nguyentuantruonglar.test:81/images/products/${items.img}')">
                                            ${items.pricesale > 0 ? '<span class="product__set__sale">-'+Math.round(items.khuyenmai)+'%</span>' : ''}
                                        </div>
                                        <div class="product__name">
                                            <h4>${items.name}</h4>
                                        </div>
                                        <div class="product__price">
                                            <div class="product__priceBox">
                                                <input type="hidden" value="${items.pricesale > 0 ? items.pricesale : items.price}" class="get__price-to-cart" />
                                                <span class="newPrice">
                                                    ${items.pricesale > 0 ? new Intl.NumberFormat('en-US').format(items.pricesale) : new Intl.NumberFormat('en-US').format(items.price)}đ
                                                </span>
                                            </div>
                                            <div class="product__priceBox">
                                                <span class="oldPrice">
                                                    ${items.pricesale > 0 ? new Intl.NumberFormat('en-US').format(items.price)+'đ' : ''}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product__option">
                                            <div class="option__view" onclick="location.href = '/${items.slug}'">
                                                <i class="fas fa-eye"></i>
                                                <div class="handle__note">
                                                    <span>Xem chi tiết</span>
                                                </div>
                                            </div>
                                            <div class="option__cart" onclick="addToCart(${items.id}, this.parentElement.parentElement)">
                                                <i class="fas fa-cart-plus"></i>
                                                <div class="handle__note">
                                                    <span>Thêm vào giỏ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    })
                    productList.innerHTML += htmls.join('')
                    loadingSvg.style.display = 'none'
                    show = false
                }
            }
        })
    }
    if(!show){
        show = true
        loadProducts(start, limit) //show = false
    }


    const productContainer = document.querySelector('.product__container--right')
    const topElement = productContainer.offsetTop
    window.onscroll = () => {
        const heightElement = productContainer.offsetHeight + topElement
        const height = window.scrollY + heightWindow
        if(height > heightElement){
            if(!show){
                show = true
                start = start + limit
                limit = 8
                loadingSvg.style.display = 'block'
                setTimeout(() => {
                    loadProducts(start, limit) 
                }, 1000);
            }
        }
        if(window.pageYOffset >= 200){
				gotoTopBtn.classList.add('active')
				document.querySelector('.header').classList.add('fixed')
			}
        else{
            gotoTopBtn.classList.remove('active')
            document.querySelector('.header').classList.remove('fixed')

        } 
    }

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
                    <li><strong class="currentBreadcrumb">Sản phẩm</strong></li>
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

                                            @foreach ($list_category as $category)
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="{{$category->slug}}">{{$category->name}}</a>
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

                                            @foreach ($list_supplier as $supplier)
                                                <li class="product__filter--items">
                                                    <a class="product__filter--items-link" href="{{$supplier->slug}}">{{$supplier->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l-9">
                            <div class="product__container--right">
                                <h2 class="product__container--right-title">Tất cả sản phẩm</h2>
                                <div class="product__order--box">
                                    <p class="product__order--text">Sắp xếp: </p>
                                    <ul class="product__order--list">
                                        <li class="product__order--items"><a href="?sortby=kytu_az" class="product__order--items-link">Từ A -> Z</a></li>
                                        <li class="product__order--items"><a href="?sortby=kytu_za" class="product__order--items-link">Từ Z -> A</a></li>
                                        <li class="product__order--items"><a href="?sortby=giagiamdan" class="product__order--items-link">Giá giảm dần</a></li>
                                        <li class="product__order--items"><a href="?sortby=giatangdan" class="product__order--items-link">Giá tăng dần</a></li>
                                        <li class="product__order--items"><a href="?sortby=moinhat" class="product__order--items-link">Hàng mới</a></li>
                                    </ul>
                                </div>

                                <div class="product__show--all">
                                    <div class="grid product__all--in-ontainer">
                                        @if (count($list_product) > 0)
                                        <div class="row render__product--items" style="flex-wrap: wrap;">
                                            {{-- @foreach ($list_product as $product) --}}

                                            {{-- <div class="col l-3" style="padding-left: 12px; padding-right: 12px; margin: 12px 0;">
                                                <div class="product__box">
                                                    <div class="product__image" style="background-image: url('{{asset('images/products/'.$product->img)}}')">
                                                        @if ($product->pricesale > 0)
                                                        <span class="product__set__sale">- {{sprintf( "%.0f", $product->khuyenmai )}}%</span>
                                                        @endif
                                                    </div>
                                                    <div class="product__name">
                                                        <h4>{{$product->name}}</h4>
                                                    </div>
                                                    <div class="product__price">
                                                        <div class="product__priceBox">
                                                            <input type="hidden" value="{{$product->pricesale > 0 ? $product->pricesale : $product->price}}" class="get__price-to-cart" />
                                                            <span class="newPrice">
                                                                @if ($product->pricesale > 0)
                                                                    {{number_format($product->pricesale, 0).'đ'}}
                                                                @else
                                                                    {{number_format($product->price, 0).'đ'}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        @if ($product->pricesale > 0)
                                                        <div class="product__priceBox">
                                                            <span class="oldPrice">
                                                                {{number_format($product->price, 0).'đ'}}
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
                                            </div> --}}
                                            {{-- @endforeach --}}
                                        </div>
                                        @else
                                            <p class="empty__items--confirmNumber">Không có sản phẩm nào</p>
                                        @endif
                                    </div>
                                </div>
    
                                
                            </div>
                        </div>
                    </div>
                    <div class="pagination__container" style="text-align: center">
                        <div class="loader loader--style1" title="0">
                            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                            <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                              s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                              c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
                            <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                              C22.32,8.481,24.301,9.057,26.013,10.047z">
                              <animateTransform attributeType="xml"
                                attributeName="transform"
                                type="rotate"
                                from="0 20 20"
                                to="360 20 20"
                                dur="0.5s"
                                repeatCount="indefinite"/>
                              </path>
                            </svg>
                          </div>
                        {{-- <span>{{ $list_product->links('vendor.pagination.default')}}</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection