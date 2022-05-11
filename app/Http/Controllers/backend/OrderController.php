<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Order::where("status", "!=", 0)
        ->join("orderdetails", "orderdetails.orderid", '=', "orders.id")
        ->selectRaw("orders.*, sum(orderdetails.amount) as total")
        ->groupByRaw("orderdetails.orderid")
        ->get();
         return view('backend.order.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function status($id)
    {
        $order = Order::find($id);
        if($order->status==2){
            $order->status = 1;
        }
        else{
            if($order->status = 1) $order->status = 2;
        }
        $order->save();
        return redirect()->route('order.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển trạng thái thành công!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where("orders.id", '=', $id)
        ->join("orderdetails", "orderdetails.orderid", '=', "orders.id")
        ->selectRaw("orders.*, sum(orderdetails.amount) as total")
        ->groupByRaw("orderdetails.orderid")
        ->first();
        $orderdetail = Orderdetail::where("orderdetails.orderid", "=", $id)
        ->join("products", "products.id", "=", "orderdetails.productid")
        ->select("orderdetails.*", "products.name as name", "products.img as img")
        ->get();
        return view("backend.order.show", compact("order", "orderdetail"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function trash()
    {
        $list = Order::where("orders.status", "=", 0)
        ->join("orderdetails", "orderdetails.orderid", '=', "orders.id")
        ->selectRaw("orders.*, sum(orderdetails.amount) as total")
        ->groupByRaw("orderdetails.orderid")
        ->get();
         return view('backend.order.trash', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('order-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function deltrash($id)
    {
        $order = Order::find($id);
        if($order == null)
        {
        return redirect()->route('order.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $order->status = 0;
        $order->save();
        return redirect()->route('order.index');
    }

    public function browse($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route("dasboard")->with('message',['typemsg' => "success",'msg' => "Đã duyệt thành công!"]);
    }

}
