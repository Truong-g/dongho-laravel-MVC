<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;

class HomeProduct extends Component
{
    public $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $row_cat = $this->category;
        $catId = $row_cat->id;
        $catSlug = $row_cat->slug;
        $arrCatId = array();
        array_push($arrCatId, $catId);
        $list_cat2 = Category::where([['status', '=', 1], ['parentid', '=', $catId]])->get();
        if(count($list_cat2) > 0){
            foreach($list_cat2 as $cat2){
                array_push($arrCatId, $cat2->id);
                $list_cat3 = Category::where([['status', '=', 1], ['parentid', '=', $cat2->id]])->get();
                if(count($list_cat3) > 0){
                    foreach($list_cat3 as $cat3){
                         array_push($arrCatId, $cat3->id);
                    }
                }
            }
        }
        // print_r($arrCatId);
        $product_list = Product::where([["status", "=", "1"], ["pricesale", ">", "0"]])
        ->whereIn('catid', $arrCatId)
        ->selectRaw('*, 100-((pricesale*100)/price) as khuyenmai')
        ->orderBy("created_at", "asc")
        ->take(8)
        ->get();
        return view('components.home-product', compact('product_list', 'catSlug'));
    }
}
