<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function handleSearch (Request $request)
    {
        if($request->tu_khoa == ''){
            $list_products = [];
            return view('frontend.search', compact('list_products'));
        }
        $list_products = Product::where([['status', '=', 1], ['name', 'like', $request->tu_khoa.'%']])
        ->selectRaw('*, 100 - ((pricesale * 100)/price) as khuyenmai')->paginate(12);
        return view('frontend.search', compact('list_products'));
    }
}
