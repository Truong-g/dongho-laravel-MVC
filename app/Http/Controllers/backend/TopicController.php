<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Str;


class TopicController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.topic.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_topic = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.topic.create', compact('list_topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $topic = new topic();
        $topic->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $topic->slug = $slug;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parentid = $request->parentid;
        $topic->orders = $request->orders;
        $topic->status = $request->status;
        $topic->created_by = 1;
        if($topic->save())
        {
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $topic->id;
            $link->type = 'topic';
            $link->save();
        }
        return redirect()->route('topic.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        $users = User::where('status','!=',0)->get();
        $topics = Topic::where('status','!=',0)->get();
        return view('backend.topic.show', compact('topic', 'users', 'topics'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $list_topic = Topic::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.topic.edit', compact('list_topic','topic'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $topic = Topic::find($id);
        $topic->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $topic->slug = $slug;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parentid = $request->parentid;
        $topic->orders = $request->orders;
        $topic->status = $request->status;
        $topic->updated_by = 1;
        if($topic->save())
        {
            $link = Link::where([['tableid', '=', $id], ['type', '=', 'topic']])->first();
            if($link!=null)
            {
                $link->slug = $slug;
                $link->save();
            }
            $list_menu = Menu::where([['tableid', '=', $id], ['type', '=', 'topic']])->get();
            if(count($list_menu) > 0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name = $topic->name;
                    $menu->link = $slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('topic.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->route('topic-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Topic::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.topic.trash', compact('list'));
    }


    public function status($id)
    {
        $topic = Topic::find($id);
        $topic->status = ($topic->status==2)?1:2;
        $topic->save();
        return redirect()->route('topic.index');
    }
    public function deltrash($id)
    {
        $topic = Topic::find($id);
        if($topic == null)
        {
        return redirect()->route('topic.index')->with('message',['typemsg' => "success",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $topic->status = 0;
        $topic->save();
        return redirect()->route('topic.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển vào thùng rác!"]);;
    }

    public function retrash($id)
    {
        $topic = Topic::find($id);
        $topic->status = 2;
        $topic->save();
        return redirect()->route('topic-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục chủ đề!"]);
    }
}
