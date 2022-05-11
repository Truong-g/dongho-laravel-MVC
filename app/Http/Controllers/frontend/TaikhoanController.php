<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class TaikhoanController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $list_orders = Order::where('orders.userid', '=', $id)
        ->join("orderdetails", "orderdetails.orderid", '=', "orders.id")
        ->selectRaw("orders.*, sum(orderdetails.amount) as total")
        ->groupByRaw("orderdetails.orderid")
        ->get();
        return view("frontend.account", compact("list_orders"));
    }
    public function changePassword(Request $request)
    {
        if (Hash::check($request->oldpw, Auth::user()->password)) {
            if($request->newpw != $request->renewpw){
                return redirect()->route('account.index')->with('message',['typemsg' => "thatbai",'msg' => "Mật khẩu nhập lại không đúng"]);
            }
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->renewpw);
            $user->save();
            return redirect()->route('account.index')->with('message',['typemsg' => "thanhcong",'msg' => "Đổi mật khẩu thành công!"]);
        }
        
        return redirect()->route('account.index')->with('message',['typemsg' => "thatbai",'msg' => "Mật khẩu cũ không đúng"]);
    }
}
