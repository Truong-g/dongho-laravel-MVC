@extends('layouts.site')
@section('title', 'Đăng nhập')
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
        <div class="row" style="align-items: center">
            
            <div class="col l-6">
                <div class="form_wrapper">
                    <div class="form_container">
                      <div class="title_container">
                        <h2>ĐĂNG NHẬP</h2>
                      </div>
                      @if($errors->has('name'))
                        <span style="width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    @if($errors->has('password'))
                        <span style="width: 100%; color:red; font-size:12px;" class="text-danger">{{ $errors->first('password') }}</span>
                     @endif
                       @includeIf('backend.message')
                      <div class="row clearfix">
                        <div class="" style="width:100%">
                          <form style="width:100%" action="{{ route('site.login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input type="text" width="100%" name="name" placeholder="Tên đăng nhập" required />
                              </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                              <input type="password" width="100%" name="password" placeholder="Mật khẩu" required />
                            </div>
                            <input class="button" type="submit" value="Đăng nhập" />
                          </form>
                          <p class="credit">Bạn đã quên mật khẩu? <a href="{{route("site.forgotpassword")}}">Nhấn vào đây</a></p>
                          <p class="credit" style="color: #222222">Bạn chưa có tài khoản? <a href="{{route('site.formregister')}}">Đăng ký</a></p>
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