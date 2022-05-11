<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Supplier;

class BrandShow extends Component
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
        $list_brand = Supplier::where('status', '=', '1')->orderBy('created_at', 'desc')->get();
        return view('components.brand-show', compact("list_brand"));
    }
}
