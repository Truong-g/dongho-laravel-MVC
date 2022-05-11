<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class SlideShow extends Component
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
        $dk = [
            ['status', '=', '1'],
            ['position', '=', 'slideshow']
        ];
        $list_slider = Slider::where($dk)->orderBy('created_at', 'asc')->get();
        return view('components.slide-show', compact('list_slider'));
    }
}
