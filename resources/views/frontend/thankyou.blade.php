@extends('layouts.site')
@section('title', 'Cảm ơn')


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
    <section class="thankyou__page">
        <div class="grid wide">
            <div class="thankyou__page--icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="thankyou__page--text">
                <h3>THANH TOÁN THÀNH CÔNG</h3>
            </div>
            <div class="thankyou__page--container">
                <div class="thankyou__page--orderer">
                    <h3>Thông tin người mua hàng</h3>
                    <ul class="thankyou__page--orderer-list">
                        <li class="thankyou__page--orderer-item">Họ tên: {{Auth::user()->fullname}}</li>
                        <li class="thankyou__page--orderer-item">Số điện thoại: {{Auth::user()->phone}}</li>
                        <li class="thankyou__page--orderer-item">Email: {{Auth::user()->email}}</li>
                        <li class="thankyou__page--orderer-item">Địa chỉ: {{Auth::user()->address}}</li>
                    </ul>
                </div>
                <div class="thankyou__page--btn">
                    <a href="{{route('site.home')}}">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </section>
@endsection