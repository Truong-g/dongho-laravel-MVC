@extends('layouts.site')
@section('title', "Đăng ký")
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
    
<section class="form__page--container" style="background:url('{{asset('images/bgform.jpg')}}')">
    <div class="grid wide">
        <div class="row">
            
            <div class="col l-6">
                <div class="form_wrapper">
                    <div class="form_container">
                      <div class="title_container">
                        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
                      </div>
                      <div class="row clearfix">
                        <div class="" style="width: 100%">
                          <form style="width: 100%" action="{{ route('site.register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input width="100%" type="text" name="username" placeholder="Tên đăng nhập" required />
                                @if($errors->has('username'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                              </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                              <input width="100%" type="password" name="password" placeholder="Mật khẩu" required />
                              @if($errors->has('password'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                              <input width="100%" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required />
                             
                            </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <input width="100%" type="email" name="email" placeholder="Email" required />
                                @if($errors->has('email'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                              </div>
                              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input width="100%" type="text" name="fullname" placeholder="Họ tên" required />
                                @if($errors->has('fullname'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('fullname') }}</span>
                                @endif
                              </div>
                              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                                <input width="100%" type="text" name="phone" placeholder="Số điện thoại" required />
                                @if($errors->has('phone'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                              </div>
                              <div class="input_field"> <span><i aria-hidden="true" class="fas fa-map-marker-alt"></i></span>
                                <input width="100%" type="text" name="address" placeholder="Địa chỉ" required />
                                @if($errors->has('address'))
                                  <span style="position: absolute; top: 100%; width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                              </div>
                            
                            <div class="input_field radio_option">
                                <input width="100%" type="radio" value="1" name="gender" checked id="1">
                                <label for="1">Nam</label>
                                <input width="100%" type="radio" value="2" name="gender" id="2">
                                <label for="2">Nữ</label>
                            </div>
                            <input width="100%" class="button" type="submit" value="Đăng ký" />
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>


            <div class="col l-6">
                <div class="formHanndle--container">
                    <img width="76%" src="{{asset('images/imageform.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection