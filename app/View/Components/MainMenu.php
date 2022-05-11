<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;
use Symfony\Component\HttpFoundation\Request;


class MainMenu extends Component
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
            ['position', '=', 'mainmenu']
        ];
        $list_menu = Menu::where($dk)->orderBy('orders', 'asc')->get();
        return view('components.main-menu', compact('list_menu'));
    }
}
