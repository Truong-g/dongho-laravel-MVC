@extends('layouts.site')
@section('title', 'Liên hệ')

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
                    <a href="{{route('site.home')}}" class="bread__crumb--link">Trang chủ</a>
                    <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                </li>
                <li><strong class="currentBreadcrumb">Liên hệ</strong></li>
            </ul>
        </div>
    </div>

    <div class="contact__container">
        <div class="grid wide">
            <div class="row">
                <div class="col l-6">
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7516950361482!2d106.77279011428737!3d10.830304561159634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIFRoxrDGoW5nIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1636972453602!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col l-6">
                    <div class="contact__text">
                        <div class="contact__text--title">
                            <h2>Liên hệ với chúng tôi</h2>
                        </div>
                        <div class="contact__text--main">
                            <form action="">
                                <div class="contact__text--main-groupTop">
                                    <div class="grid">
                                        <div class="row">
                                            <div class="col l-6">
                                                <input type="text" placeholder="Nhập tên của bạn">
                                                <input type="email" placeholder="Nhập email của bạn">
                                            </div>
                                            <div class="col l-6">
                                                <input type="text" placeholder="Nhập số điện thoại của bạn">
                                                <input type="text" placeholder="Nhập địa chỉ của bạn">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact__text--main-groupBottom">
                                    <textarea name="" id="" cols="30" rows="5" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="contact__text--main-btn">
                                    <button type="submit">Gửi ngay</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection