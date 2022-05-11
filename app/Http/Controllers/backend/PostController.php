<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $list = Post::where([['posts.status','!=',0], ['posts.posttype', '=', 'post']])
        ->join('topics', 'topics.id', '=', 'posts.topid')
        ->orderby('posts.created_at','desc')
        ->select("posts.id", "posts.img", "posts.title", "posts.created_at", "posts.status", "topics.name as topname")
        ->get();
        return view('backend.post.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list_post = Post::where('status','!=',0)->orderby('created_at','desc')->get();
        $list_topic = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.post.create', compact('list_topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = new Post();
        $post->title = $request->title;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;
        $post->posttype = 'post';
        $post->content = $request->content;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->topid = $request->topid;
        $post->status = $request->status;
        $post->created_by = 1;

        if($request->hasFile('img'))
        {
            $path_dir = "images/posts/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $post->img = $fileName;
            $post->save();
            return redirect()->route('post.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
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
        $post = Post::find($id);
        $topics = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.post.show', compact('post', 'users', 'topics'));

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
        $list_topic = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.post.edit', compact('list_topic','post'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $post = Post::find($id);
        $post->title = $request->title;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug;
        $post->posttype = 'post';
        $post->content = $request->content;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->topid = $request->topid;
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
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
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
        return redirect()->route('post-trash')->with('message',['typemsg' => "succes",'msg' => "Thêm thành công!"]);

    }

    public function trash()
    {
        $list = Post::where([['posts.status','=',0], ['posts.posttype', '=', 'post']])
        ->join('topics', 'topics.id', '=', 'posts.topid')
        ->orderby('posts.created_at','desc')
        ->select("posts.id", "posts.img", "posts.title", "posts.created_at", "posts.status", "topics.name as topname")
        ->get();
        return view('backend.post.trash', compact('list'));
    }


    public function status($id)
    {
        $post = Post::find($id);
        $post->status = ($post->status==2)?1:2;
        $post->save();
        return redirect()->route('post.index');
    }
    public function deltrash($id)
    {
        $post = Post::find($id);
        if($post == null)
        {
        return redirect()->route('post.index')->with('message',['typemsg' => "success",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $post->status = 0;
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg' => "success",'msg' => "Thêm vào thùng rác thành công!"]);
    }

    public function retrash($id)
    {
        $post = Post::find($id);
        $post->status = 2;
        $post->save();
        return redirect()->route('post-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục bài viết!"]);
    }
}
