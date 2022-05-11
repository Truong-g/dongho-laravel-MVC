<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
use App\Models\Topic;

class NewsPost extends Component
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
        $list_news = Post::where([['posts.status','=', 1], ['posts.posttype', '=', 'post']])
        ->join('topics', 'topics.id', '=', 'posts.topid')
        ->orderby('posts.created_at','desc')
        ->select('posts.*', 'topics.name', 'topics.slug as slugtop')
        ->limit(3)
        ->get();
        return view('components.news-post', compact('list_news'));
    }
}
