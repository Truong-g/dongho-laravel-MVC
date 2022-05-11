<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Link;
use App\Models\Menu;
use App\Models\User;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Support\Str;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Post::where([['status','!=',0], ['posttype', '=', 'page']])
        ->orderby('posts.created_at','desc')
        ->get();
        return view('backend.page.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $post = new Post();
        $post->title = $request->title;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;
        $post->posttype = 'page';
        $post->content = $request->content;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->status = $request->status;
        $post->created_by = 1;

        if($request->hasFile('img'))
        {
            $path_dir = "images/posts/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $post->img = $fileName;
            if($post->save())
            {
                $link = new Link();
                $link->slug = $slug;
                $link->tableid = $post->id;
                $link->type = 'page';
                $link->save();
            }
            return redirect()->route('page.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
        }
        else{
            return redirect()->back()->with('imgerror', "Chưa chọn hình ảnh.");

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Post::find($id);
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.page.show', compact('page', 'users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('backend.page.edit', compact('post'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $post = Post::find($id);
        $post->title = $request->title;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;
        $post->title =  $request->title;
        $post->posttype = 'page';
        $post->content = $request->content;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->status = $request->status;
        $post->updated_by = 1;

        if($request->hasFile('img'))
        {
            $path_dir = "images/posts/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $post->img = $fileName;
        }
        if($post->save())
        {
            $link = Link::where([['tableid', '=', $id], ['type', '=', 'page']])->first();
            if($link!=null)
            {
                $link->slug = $slug;
                $link->save();
            }
            $list_menu = Menu::where([['tableid', '=', $id], ['type', '=', 'page']])->get();
            if(count($list_menu) > 0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name = $post->title;
                    $menu->link = $slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('page.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('page-trash')->with('message',['typemsg' => "succes",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Post::where([['status','=',0], ['posttype', '=', 'page']])
        ->orderby('created_at','desc')
        ->get();
        return view('backend.page.trash', compact('list'));
    }


    public function status($id)
    {
        $post = Post::find($id);
        $post->status = ($post->status==2)?1:2;
        $post->save();
        return redirect()->route('page.index');
    }
    public function deltrash($id)
    {
        $post = Post::find($id);
        if($post == null)
        {
        return redirect()->route('page.index')->with('message',['typemsg' => "success",'msg' => "Trang đơn tin đã tồn tại!"]);
        }
        $post->status = 0;
        $post->save();
        return redirect()->route('page.index')->with('message',['typemsg' => "success",'msg' => "Thêm vào thùng rác thành công!"]);
    }

    public function retrash($id)
    {
        $post = Post::find($id);
        $post->status = 2;
        $post->save();
        return redirect()->route('page-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục trang đơn!"]);
    }
}
