<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class ConfirmShow extends Component
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
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $list_confirm = Post::where([['status','=', 1], ['posttype', '=', 'post']])
        ->orderby('created_at','desc')
        ->limit(8)
        ->get();
        return view('components.confirm-show', compact("list_confirm"));
    }
}
