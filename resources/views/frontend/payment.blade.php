@extends('layouts.site')
@section('title', 'Thanh toán')

@section('javascript')

    <script type="text/javascript">

        const showToast = document.querySelector('.toast-fail')


        const nameReciver = document.querySelector('.payment__center--text.name')
        const phoneReciver = document.querySelector('.payment__center--text.phone')
        const emailReciver = document.querySelector('.payment__center--text.email')
        const noteReciver = document.querySelector('.payment__center--textarea.note-text')
        const buttonPayment = document.querySelector('.payment__right--btn')
        const cartList = JSON.parse(localStorage.getItem('cart_list'))
        let newcartList
        if(cartList){
            newcartList = cartList.map(item => {
            return `{"id":"${item.id}", "name":"${item.name}", "img":"${item.img}", "price":"${item.price}", "quantity":"${item.quantity}", "amount":"${item.total}"}`
        })
        }
        
        const jsonCart = JSON.stringify(newcartList)

        const _token = '{{csrf_token()}}';

        function sendCart() {

            $.ajax({
                url:"{{route('ajax.sendcart')}}",
                method: 'POST',
                data: {
                        nameReciver : nameReciver.value, 
                        phoneReciver: phoneReciver.value,
                        emailReciver: emailReciver.value,
                        noteReciver: noteReciver.value,
                        addressReciver: fullAddressValue.value,
                        cartList: jsonCart,
                        _token : _token
                    },
                success: function(data)
                    {
                        if(data != ''){
                            console.log(data);
                        }else{
                            window.location.href = 'http://nguyentuantruonglar.test:81/thank-you'
                            localStorage.removeItem('cart_list')
                        }
                    },
                error: function(){
                    
                }
            });
        }

        buttonPayment.onclick = (e) => {
            e.preventDefault()
            
            if(!nameReciver.value || !phoneReciver.value || !emailReciver.value || !fullAddressValue.value || cartList.length == 0){
                showToast.classList.add("active")
                const time =  setTimeout(() => {
                const time = showToast.classList.remove("active")
                clearTimeout(time)
            }, 2000);
            }else{
                sendCart()
            }
        }

    </script>
    
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

<div class="toast-fail">
    <span class="toast-fail-text">Vui lòng nhập đầy đủ thông tin!</span>
</div>

@endsection

@section('maincontent')

<section class="payment__container">

    <div class="bread__crumb">
        <div class="grid wide">
            <ul>
                <li>
                    <a href="{{url('/')}}" class="bread__crumb--link">Trang chủ</a>
                    <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                </li>
                <li><strong class="currentBreadcrumb">Thanh toán</strong></li>
            </ul>
        </div>
    </div>
    <form action="">
        <div class="grid wide">
            <div class="row">
                <div class="col l-4">
                    <div class="paymant__leftBox">
                        <div class="payment__infor--orderer-container">
                            <h3 class="payment__title">Thông tin người đặt hàng</h3>
                            @if (Auth::check())
                            <p class="payment__infor--order-text">Họ và tên: <span class="payment__infor--order-val">{{Auth::user()->fullname}}</span></p>
                            <p class="payment__infor--order-text">Email: <span class="payment__infor--order-val">{{Auth::user()->email}}</span></p>
                            <p class="payment__infor--order-text">Số điện thoại: <span class="payment__infor--order-val">{{Auth::user()->phone}}</span></p>
                            <p class="payment__infor--order-text">Địa chỉ: <span class="payment__infor--order-val">{{Auth::user()->address}}</span></p>
                            @else
                            <a href="{{route('site.formlogin')}}">Đăng nhập</a>
                            @endif
                            
                        </div>
                        <div class="payment__left--charges--container">
                            <h3 class="payment__left--charges--title">Vận chuyển</h3>
                            <div class="payment__left--charges--box">
                                <span class="payment__left--charges-value">Phí giao hàng</span>
                                <span class="payment__left--charges-value">40.000đ</span>
                            </div>
                        </div>
                        <div class="payment__left--charges--container">
                            <h3 class="payment__left--charges--title">Phương thức thanh toán</h3>
                            <div class="payment__left--charges--box">
                                <span class="payment__left--charges-value">Thanh toán khi nhận hàng</span>
                                <input type="radio" class="payment__left--charges-value" />
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col l-4">
                    <div class="payment__centerBox">
                        @csrf
                        <div class="payment__infor--reciver-container">
                            <h3 class="payment__title">Thông tin người nhận hàng</h3>
                            <div class="payment__center--input">
                                <input type="text" class="payment__center--text name" placeholder="Họ tên người nhận" required>
                            </div>
                            <div class="payment__center--input">
                                <input type="text" class="payment__center--text email" placeholder="Email" required>
                            </div>
                            <div class="payment__center--input">
                                <input type="text" class="payment__center--text phone" placeholder="Số điện thoại" required>
                            </div>
                            <span class="payment__infor--order-text" style="display:inline-block">Địa chỉ</span>
                            <div class="payment__center--input dropdown">
                                <input type="text" class="payment__center--text province" placeholder="Tỉnh, thành" disabled>
                                <span class="icon__dropdown--payment" onclick="showBoxAddresProvince()"><i class="fas fa-chevron-down"></i></span>
                                <div class="payment__center--input-dropdown-list province">
                                    <ul class="payment__adresslist province">
                                        {{-- tỉnh thành ở đây --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="payment__center--input dropdown">
                                <input type="text" class="payment__center--text district" placeholder="Quận, huyện" disabled>
                                <span class="icon__dropdown--payment district"><i class="fas fa-chevron-down"></i></span>
                                <div class="payment__center--input-dropdown-list district">
                                    <ul class="payment__adresslist districts">
                                        {{-- Quận huyện ở đây --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="payment__center--input dropdown">
                                <input type="text" class="payment__center--text wards" placeholder="Phường, xã" disabled>
                                <span class="icon__dropdown--payment wards"><i class="fas fa-chevron-down"></i></span>
                                <div class="payment__center--input-dropdown-list wards">
                                    <ul class="payment__adresslist wards">
                                        {{-- Phường xã ở đây --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="payment__center--fulladdress-container" style="margin-bottom: 15px">
                                <textarea rows="3" style="padding: 10px" class="payment__center--textarea" id="payment__center--fulladdress" placeholder="Địa chỉ của bạn" disabled required></textarea>
                            </div>
                            <div class="payment__center--input">
                                <textarea rows="5" class="payment__center--textarea note-text" placeholder="Ghi chú" style="padding: 10px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-4">
                    <div class="payment__rightBox">
                        <h3 class="payment__left--charges--title" style="margin:0;">Đơn hàng</h3>
                        <div class="grid">
                            <div class="payment__right--listcart">
                                
                            </div>
                        </div>
                        <div class="payment__right--calc">
                            <span class="payment__right--calc-text">Tạm tính</span>
                            <span class="payment__right--calc-text value">0đ</span>
                        </div>
                        <div class="payment__right--calc">
                            <span class="payment__right--calc-text">Phí vận chuyển</span>
                            <span class="payment__right--calc-text">40.000đ</span>
                        </div>
                        <div class="payment__right--total-box">
                            <div class="payment__right--total-textandval">
                                <h3 class="payment__right--total-text">Tổng cộng:</h3>
                                <h2 class="payment__right--total-value">3900000đ</h2>
                            </div>
                            <div class="payment__right--total-textandval" style="margin-top: 15px">
                                <a href="{{route('cart.index')}}" class="payment__right--links"><i class="fas fa-chevron-left"></i> Quay về giỏ hàng</a>
                                <button class="payment__right--btn">Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

</section>
    
@endsection