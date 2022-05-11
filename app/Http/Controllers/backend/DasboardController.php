<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DasboardController extends Controller
{
    Public function index()
    {
        $list = Order::where("orders.status", '=', 3)
        ->join("orderdetails", "orderdetails.orderid", '=', "orders.id")
        ->selectRaw("orders.*, sum(orderdetails.amount) as total")
        ->groupByRaw("orderdetails.orderid")
        ->get();
        return view('backend.dasboard.index', compact('list'));
    }
}
