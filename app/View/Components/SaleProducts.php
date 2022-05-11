<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class SaleProducts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list_salePd = Product::where([["created_at", ">=", "2021-10-30"],["status", "=", "1"]])
        ->selectRaw('*, 100-((pricesale*100)/price) as khuyenmai')
        ->orderBy("created_at", "desc")->limit(10)->get();
        return view('components.sale-products', compact("list_salePd"));
    }
}
