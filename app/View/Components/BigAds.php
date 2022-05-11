<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class BigAds extends Component
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
        $list_bigads = Slider::where([["status", "=", "1"], ["position", "=", "bigads"]])->orderBy('created_at', 'desc')->limit(3)->first();
        return view('components.big-ads', compact('list_bigads'));
    }
}
