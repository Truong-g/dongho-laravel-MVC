<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Str;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::where([['status', '!=', 0], ['roles', '!=', 'user']])->orderby('created_at','asc')->get();
        return view('backend.member.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::find($id);
        return view('backend.member.show', compact('member'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $list_user = User::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.member.edit', compact('list_user','user'));
    
    }
    public function role($id, $role)
    {
        $user = User::find($id);
        $user->roles = $role;
        $user->save();
        return redirect()->route('member.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển đổi quyền thành viên!"]);;
    }

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
        return view('backend.member.trash', compact('list'));
    }


    public function status($id)
    {
        $user = User::where('id', '=', $id)->first();
        if($user->roles == 'superadmin'){
            return redirect()->route('member.index')->with('message',['typemsg' => "danger",'msg' => "Bạn không thể khóa tài khoản người có quyền cao nhất"]);
        }
        else{
            $user->status = ($user->status==2)?1:2;
            $user->save();
            return redirect()->route('member.index')->with('message',['typemsg' => "success",'msg' => "Đã khóa tài khoản người dùng!"]);
        }
    }


    public function deltrash($id)
    {
        $user = User::where('id', '=', $id)->first();
        if($user->roles == 'superadmin'){
            return redirect()->route('member.index')->with('message',['typemsg' => "danger",'msg' => "Bạn không thể xóa người có quyền cao nhất"]);
        }
        else{
            if($user == null)
            {
                return redirect()->route('member.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin đã tồn tại!"]);
            }
            $user->status = 0;
            $user->save();
            return redirect()->route('member.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển người dùng vào thùng rác"]);
            }
    }

    public function retrash($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return redirect()->route('member-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục người dùng!"]);;
    }
}
