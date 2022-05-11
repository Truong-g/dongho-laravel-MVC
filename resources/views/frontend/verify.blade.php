
<div>
    <img style="width: 100px" src="{{asset("images/logo/logo1.png")}}" alt="logo">
</div>

<h3>Xin chào {{ $user->fullname }}!</h3>
<p>Để xác nhận thay đổi mật khẩu, mời bạn vui lòng nhấn vào đây.</p>
<a href="{{route("site.handleresetpassword", ['email' => $user->email, 'token' => $token ])}}">Xác nhận</a>
