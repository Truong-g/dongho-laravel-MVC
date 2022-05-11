<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::where([['status','!=',0],['roles', '=', 'user']])->orderby('created_at','desc')->get();
        return view('backend.user.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list_user = User::where()->orderby('created_at','desc')->get();
        // return view('backend.user.create', compact('list_user'));
    }

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
        $user = User::find($id);
        return view('backend.user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-trash')->with('message',['typemsg' => "success",'msg' => "Đã xóa người dùng!"]);

    }

    public function trash()
    {
        $list = User::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.user.trash', compact('list'));
    }


    public function status($id)
    {
        $user = User::find($id);
        $user->status = ($user->status==2)?1:2;
        $user->save();
        return redirect()->route('user.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển khóa tài khoản người dùng!"]);;
    }
    public function deltrash($id)
    {
        $user = User::find($id);
        if($user == null)
        {
        return redirect()->route('user.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $user->status = 0;
        $user->save();
        return redirect()->route('user.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển người dùng vào thùng rác"]);;
    }

    public function retrash($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return redirect()->route('user-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục người dùng!"]);;
    }
}
