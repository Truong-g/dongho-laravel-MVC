<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;

class FooterMenu2 extends Component
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
            ['parentid', '=', '0'],
            ['position', '=', 'footermenu2']
        ];
        $list_footer_menu2 = Menu::where($dk)->orderBy('orders', 'asc')->get();
        return view('components.footer-menu2', compact("list_footer_menu2"));
    }
}
