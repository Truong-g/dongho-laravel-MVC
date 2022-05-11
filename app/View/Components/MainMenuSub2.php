<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;
use Illuminate\Http\Request;



class MainMenuSub2 extends Component
{
    public $menusub;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menusub)
    {
        $this->menusub = $menusub;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       $row_menu = $this->menusub;
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
        return view('components.main-menu-sub2', compact('row_menu', 'list_menu_sub', 'sub'));
    }
}
