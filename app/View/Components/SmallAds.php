<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class SmallAds extends Component
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
        $list_smallads = Slider::where([["status", "=", "1"], ["position", "=", "smallads"]])->orderBy('created_at', 'desc')->limit(3)->get();
        return view('components.small-ads', compact("list_smallads"));
    }
}
