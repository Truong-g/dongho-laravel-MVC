@extends('layouts.site')
@section('title', 'Giỏ hàng')

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
    <section>
        <div class="bread__crumb">
            <div class="grid wide">
                <ul>
                    <li>
                        <a href="{{url('/')}}" class="bread__crumb--link">Trang chủ</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li><strong class="currentBreadcrumb">Giỏ hàng</strong></li>
                </ul>
            </div>
        </div>
        <div class="grid wide">
            <div class="cart__container">
                <div class="row">
                    <div class="col l-9">

                        <div class="cart__left">
                            <div class="cart__left--header">
                                <div class="row">
                                    <div class="col l-1">
                                        <h3 class="cart__left--header-title">Xóa</h3>
                                    </div>
                                    <div class="col l-2">
                                        <h3 class="cart__left--header-title">Hình ảnh</h3>
                                    </div>
                                    <div class="col l-4">
                                        <h3 class="cart__left--header-title">Thông tin sản phẩm</h3>
                                    </div>
                                    <div class="col l-2">
                                        <h3 class="cart__left--header-title">Số lượng</h3>
                                     </div>
                                    <div class="col l-3">
                                        <h3 class="cart__left--header-title">Tổng tiền</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__left--main">
                                
                            </div>
                        </div>

                    </div>
                    <div class="col l-3">
                        <div class="produuct__page--onlineSupport">
                            <h2 class="produuct__page--onlineSupport-title">Chúng tôi luôn sẵn sàng giúp đỡ bạn</h2>
                            <div class="produuct__page--onlineSupport-img">
                                <img src="{{asset('images/support.jpg')}}" alt="">
                            </div>
                            <p class="produuct__page--onlineSupportPhoneText">Để được hổ trợ tốt nhất, hãy gọi: </p>
                            <a href="tel:12345678" class="produuct__page--onlineSupportPhoneValue">12345678</a>
                            <div class="produuct__page--onlineSupportMsg">
                                <span class="produuct__page--onlineSupportMsgText1">HOẶC</span>
                                <p class="produuct__page--onlineSupportMsgText2">Chat hỗ trợ trực tuyến</p>
                                <a href="/lien-he" class="produuct__page--onlineSupportMsgLink">Chat với chúng tôi</a>
                            </div>
                        </div>
                        <div class="cart__right--sum">
                            <h3 class="cart__sum--title">Tổng tiền: 
                                <span class="cart__sum--value">0đ</span>
                            </h3>
                            <button class="cart__right--clear-btn" onclick="handleClearCart()">Xóa tất cả</button>
                            <a href="{{route('site.home')}}" class="cart__right--continute-btn">Tiếp tục mua hàng</a>
                            @if (Auth::check())
                            <span onclick="redirectPageCart('{{route('cart.index')}}', '{{route('payment.index')}}')" class="cart__right--payment-btn">Tiến hành thanh toán</span>
                            @else
                            <span onclick="location.href='/dang-nhap'" class="cart__right--payment-btn">Tiến hành thanh toán</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection