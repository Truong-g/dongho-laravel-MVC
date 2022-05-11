<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resetpassword;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
use Mail;


class AuthController extends Controller
{
    public function formlogin()
    {
        return view('frontend.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('site.home');
        }
        return back()->with('message',['typemsg' => "thatbai",'msg' => "Mật khẩu không hợp lệ"]);
    }

    public function formregister()
    {
        return view('frontend.register');
    }

    public function register(RegisterRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
       $user = new User();
       $user->name = $request->username;
       $user->email = $request->email;
       $user->password = bcrypt($request->repassword);
       $user->fullname = $request->fullname;
       $user->phone = $request->phone;
       $user->address = $request->address;
       $user->gender = $request->gender;
       $user->roles = 'user';
       $user->created_by = 1;
       $user->updated_by = 1;
       $user->remember_token = $request->_token;
       $user->status = 1;
       $user->save();
       return redirect()->route('site.formlogin')->with('message',['typemsg' => "thanhcong",'msg' => "Đăng ký thành công! Vui lòng nhập tài khoản để đăng nhập."]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }

    public function loginAdmin()
    {
        return view('backend.login.index');
    }

    public function handleLoginAdmin(Request $request)
    {
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dasboard');
        }
        return redirect()->route('admin.login')->with('message',['typemsg' => "thatbai",'msg' => "Tài khoản hoặc mật khẩu không hợp lệ"]);
    }

    public function forgot_password()
    {
        return view("frontend.forgotpassword");
    }

    public function handle_forgot_password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user == null){
            return back()->with('message',['typemsg' => "thatbai",'msg' => "Email không tồn tại!"]);
        }

        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $token = bin2hex(random_bytes(60));

        $resetpw = new Resetpassword();
        $resetpw->email = $request->email;
        $resetpw->token = $token;
        $resetpw->save();

        Mail::send('frontend.verify',[ 'user' => $user, "token" => $token] , function ($message) use($user) {
            $message->to($user->email);
            $message->subject("$user->fullname, Thay đổi mật khẩu");
        });
        return back()->with('message',['typemsg' => "thanhcong",'msg' => "Chúng tôi vừa gửi email tới bạn. Vui lòng xác thực email!"]);
    }

    public function handle_reset_password($email, $token)
    {
        $user = User::whereEmail($email)->first();

        if(!$user) echo "Email không tồn tại";
        $resetpw = Resetpassword::whereEmail($email)->orderBy("created_at", "desc")->first();

        if($resetpw){
            if($token == $resetpw->token){
                return view("frontend.resetpassword", compact("email"));
            }
            else{
                return redirect()->route("site.home");
            }
        }
        else{
            echo "Hết thời gian";
        }
    }

    public function reset_password(Request $request)
    {

        if($request->password != $request->repassword){
            return back()->with('message',['typemsg' => "thatbai",'msg' => "Mật khẩu nhập lại không đúng"]);
        }
        $user = User::whereEmail($request->email)->first();
        $user->password = bcrypt($request->repassword);
        $user->save();

        return redirect()->route("site.formlogin")->with('message',['typemsg' => "thanhcong",'msg' => "Thay đổi mật khẩu thành công!"]);
    }
}
