<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;
use Symfony\Component\HttpFoundation\Request;




class MainMenuSub extends Component
{
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       $row_menu = $this->menu;
       $dk = [
           ['status', '=', 1],
           ['parentid', '=', $row_menu->id],
           ['position', '=', 'mainmenu']
       ];
       $list_menu_sub = Menu::where($dk)->orderBy('orders', 'asc')->get();
        $sub = false;
        if(count($list_menu_sub) > 0){
            $sub = true;
        }
        return view('components.main-menu-sub', compact('row_menu', 'list_menu_sub', 'sub'));
    }
}
