<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('template/dist/css/style.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
      .alert.alert-thatbai{
        color: red;
        font-size: 13px
      }

    </style>
    <title>Đăng nhập</title>
</head>
<body>
    <div class="login-block">
    <h1>Đăng Nhập Trang Quản Trị</h1>
    @includeIf('backend.message')
    <form action="{{ route('admin.handlelogin') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <input type="text" name="username" placeholder="Tên đăng nhập" id="username" />
        <input type="password" name="password" placeholder="Mật khẩu" id="password" />
        <button type="submit">Đăng nhập</button>
    </form>
    <p class="text forgot--password">Quên mật khẩu? Nhấn vào đây</p>
    <p class="text register">Đăng ký thành viên? Nhấn vào đây</p>
</div>
  </body>
</html>