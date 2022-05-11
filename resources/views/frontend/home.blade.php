@extends('layouts.site')
@section('title', 'Trang chủ')
@section('header')
<link rel="stylesheet" href="{{asset('slickslider/slick-theme.min.css')}}"/>
<link rel="stylesheet" href="{{asset('slickslider/slick.min.css')}}"/>

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
@section('javascript')
<script src = {{asset("js/main.js")}}></script>
<script src="{{asset('slickslider/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('slickslider/slick.min.js')}}"></script>
<script src="{{asset('slickslider/slick.js')}}"></script>

<script type="text/javascript">
		
        $('.multiple-items').slick({
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 1
              });


</script>



@endsection

@section('maincontent')
<section class="content">

    <x-slide-show />

    <div class="service__container">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3">
                    <div class="service__container--items">
                        <div class="service__container--img">
                            <img src="{{asset("images/service/icon_service_1.svg")}}" alt="">
                        </div>
                        <h2 class="service__container--title">Vận chuyển toàn cầu</h2>
                        <p class="service__container--content">Chúng tôi miễn phí vận chuyển với tất cả các đơn hàng trị giá trên 2.000.000Đ.</p>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="service__container--items">
                        <div class="service__container--img">
                            <img src="{{asset("images/service/icon_service_2.svg")}}" alt="">
                        </div>
                        <h2 class="service__container--title">Hỗ trợ online 24/24</h2>
                        <p class="service__container--content">Chúng tôi luôn luôn hỗ trợ khách hàng 24/24 tất cả các ngày trong tuần.</p>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="service__container--items">
                        <div class="service__container--img">
                            <img src="{{asset("images/service/icon_service_3.svg")}}" alt="">
                        </div>
                        <h2 class="service__container--title">Miễn phí đổi trả</h2>
                        <p class="service__container--content">Miễn phí đổi trả trong vòng 15 ngày đầu tiên áp dụng cho tất cả các mặt hàng.</p>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="service__container--items">
                        <div class="service__container--img">
                            <img src="{{asset("images/service/icon_service_4.svg")}}" alt="">
                        </div>
                        <h2 class="service__container--title">Quà tặng hấp dẫn</h2>
                        <p class="service__container--content">Chương trình khuyễn mãi cực lớn và hấp dẫn vào mỗi chủ nhật hàng tuần.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-sale-products />

    <x-small-ads />


    @if (count($list_category) > 0)
        @foreach ($list_category as $category)
            <div class="product__onCate__container">
                <div class="grid wide">
                    <div class="product__onCate__title watchMan">
                        <h2>{{$category->name}}</h2>
                    </div>

                    <div class="product__onCate__show">
                        <div class="row">
                            <x-home-hot-product :category="$category"/>
                            <x-home-product :category="$category"/>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
    <x-big-ads />

    <x-news-post />

</section>


@endsection