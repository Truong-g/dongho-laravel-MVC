<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guest() || Auth::user()->roles == 'user'){ //Auth::guest() ==> chua dang nhap la true... dang nhapp roi la false
            return redirect()->intended(route('admin.login'))->with('message',['typemsg' => "thatbai",'msg' => "Tài khoản hoặc mật khẩu không hợp lệ"]);
        }
        return $next($request);
    }
}
