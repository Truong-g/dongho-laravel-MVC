@extends('layouts.site')
@section('title', 'Không tìm thấy trang')
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
@section('javascrift')
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
<section >

    <div class="grid wide">
        <div class="error404__container" style="padding: 20px; background-color:#cccccc; margin: 20px 0; border-radius:10px">
            <h1 class="error404--title" style="text-align: center">LỖI 404!</h1>
            <p style="text-align: center; margin-top:10px">Không tìm thấy trang</p>
        </div>
    </div>

</section>


@endsection