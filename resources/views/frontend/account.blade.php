@extends('layouts.site')
@section('title', 'Tài khoản')

@section('javascript')

    <script type="text/javascript">
        const listOption = document.querySelectorAll('.item__account--option')
        const listBoxOption = document.querySelectorAll('.account-page__container')

        listOption.forEach((element, index) => {
            element.onclick = () => {
                removeActive();
                listBoxOption[index].classList.add("active")
                element.classList.add("active")
            }

        })
        function removeActive() {
            listBoxOption.forEach(element => {
                element.classList.remove("active")
            });
            listOption.forEach(element => {
                element.classList.remove("active")
            })
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
@endsection


@section('maincontent')
    <section class="account-page">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3">
                    <div class="account__continer--left">
                        <div class="account__avatar--container">
                            <div class="account__avatar">
                                <img src={{asset('images/avt.jpg')}} alt="" class="avatar__img">
                            </div>
                            <div class="account__name">
                                <h3 class="avatar__name">{{Auth::user()->fullname}}</h3>
                            </div>
                        </div>
                        <div class="account__option">
                            <ul class="list__account--option">
                                <li class="item__account--option active">Đổi mật khẩu</li>
                                <li class="item__account--option">Thông tin khách hàng</li>
                                <li class="item__account--option">Đơn hàng</li>
                                <li class="item__account--option">Trợ giúp</li>
                                <a href={{route("site.logout")}} class="link__account--option">Đăng xuất</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col l-9">
                    <div class="account-page__container active">
                        <div class="account-page__container--title">
                            <h2>Đổi mật khẩu</h2>
                            <hr />
                        </div>
                        <div class="account-page__container--main">
                            <p class="account-page__main-name">Để đảm bảo bảo mật, vui lòng nhập mật khẩu trên 5 ký tự.</p>
                            <div class="account-page__container-form">
                                @includeIf('backend.message')
                                <form action="{{route('account.change')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="account-page__formgroup">
                                        <label class="account-page__main-name" for="">Mật khẩu cũ:</label>
                                        <input type="password" name="oldpw" class="account-page__input" required>
                                    </div>
                                    <div class="account-page__formgroup">
                                        <label class="account-page__main-name" for="">Mật khẩu mới:</label>
                                        <input type="password" name="newpw" class="account-page__input" required>
                                    </div>
                                    <div class="account-page__formgroup">
                                        <label class="account-page__main-name" for="">Nhập lại mật khẩu: </label>
                                        <input type="password" name="renewpw" class="account-page__input" required>
                                    </div>
                                    <button class="account-page__btn">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="account-page__container">
                        <div class="account-page__container--title">
                            <h2>Thông tin khách hàng</h2>
                            <hr />
                        </div>
                        <div class="account-page__container--main">
                            <p class="account-page__main-name">
                                Tên khác hàng:
                                <span class="account-page__main-value">{{Auth::user()->fullname}}</span>
                            </p>
                            <p class="account-page__main-name">
                                Giới tính:
                                <span class="account-page__main-value">{{Auth::user()->gender == "1" ? "Nam" : "Nữ"}}</span>
                            </p>
                            <p class="account-page__main-name">
                                Số điện thoại:
                                <span class="account-page__main-value">{{Auth::user()->phone}}</span>
                            </p>
                            <p class="account-page__main-name">
                                Email:
                                <span class="account-page__main-value">{{Auth::user()->email}}</span>
                            </p>
                            <p class="account-page__main-name">
                                Địa chỉ:
                                <span class="account-page__main-value">{{Auth::user()->address}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="account-page__container">
                        <div class="account-page__container--title">
                            <h2>Đơn hàng</h2>
                            <hr />
                        </div>
                        <div class="account-page__container--main">
                            <table class="account-page_table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">Đơn hàng</th>
                                        <th style="width: 20%">Ngày</th>
                                        <th style="width: 40%">Địa chỉ</th>
                                        <th style="width: 20%"> Giá trị đơn hàng</th>
                                        <th style="width: 15%">TT thanh toán</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_orders as $order)
                                        <tr>
                                            <td style="width: 5%">#ĐH{{$order->id}}</td>
                                            <td style="width: 15%">{{$order->created_at->format('d/m/Y')}}</td>
                                            <td style="width: 40%">{{$order->address}}</td>
                                            <td style="width: 20%" >{{number_format($order->total)}}đ</td>
                                            <td style="width: 15%">
                                                @php
                                                    if($order->status == 3) echo "Đang chờ duyệt";
                                                    if($order->status == 2) echo "Đang vận chuyển";
                                                    if($order->status == 1) echo "Đã thu tiền";
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                            @if (count($list_orders) <= 0)
                                <p style="text-align:center; padding: 3px 0; border: 1px solid #ccc">Không có đơn hàng nào</p>
                            @endif
                        </div>
                    </div>
                    <div class="account-page__container">
                        <div class="account-page__container--title">
                            <h2>Trợ giúp</h2>
                            <hr />
                        </div>
                        <div class="account-page__container--main">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection