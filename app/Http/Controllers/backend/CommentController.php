<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use Illuminate\Support\Str;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Comment::where('comments.status','!=',0)->orderby('comments.created_at','desc')
        ->join('posts', 'posts.id', '=', 'comments.postid')
        ->select('comments.*', 'comments.content as commcontent', 'comments.id as commid')->get();
        return view('backend.comment.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::where('comments.id','=',$id)
        ->join('posts', 'posts.id', '=', 'comments.postid')
        ->select('comments.*', 'posts.title as title', 'comments.content as commcontent')->first();
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.comment.show', compact('comment', 'users'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comment-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Comment::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.comment.trash', compact('list'));
    }


    public function status($id)
    {
        $comment = Comment::find($id);
        $comment->status = ($comment->status==2)?1:2;
        $comment->save();
        return redirect()->route('comment.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển trạng thái thành công!"]);
    }
    public function deltrash($id)
    {
        $comment = Comment::find($id);
        if($comment == null)
        {
        return redirect()->route('comment.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin ko tồn tại!"]);
        }
        $comment->status = 0;
        $comment->save();
        return redirect()->route('comment.index');
    }

    public function retrash($id)
    {
        $comment = Comment::find($id);
        $comment->status = 2;
        $comment->save();
        return redirect()->route('comment-trash');
    }
}
