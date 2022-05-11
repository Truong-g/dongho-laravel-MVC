<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use App\Models\Menu;
use App\Models\User;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.category.create', compact('list_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = new Category();
        $category->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $category->slug = $slug;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->parentid = $request->parentid;
        $category->orders = $request->orders;
        $category->status = $request->status;
        $category->created_by = 1;
        if($category->save())
        {
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $category->id;
            $link->type = 'category';
            $link->save();
        }
        return redirect()->route('category.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        $categories = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.category.show', compact('category', 'users', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.category.edit', compact('list_category','category'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $category = Category::find($id);
        $category->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $category->slug = $slug;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->parentid = $request->parentid;
        $category->orders = $request->orders;
        $category->status = $request->status;
        $category->updated_by = 1;
        if($category->save())
        {
            $link = Link::where([['tableid', '=', $id], ['type', '=', 'category']])->first();
            if($link!=null)
            {
                $link->slug = $slug;
                $link->save();
            }
            $list_menu = Menu::where([['tableid', '=', $id], ['type', '=', 'category']])->get();
            if(count($list_menu) > 0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name = $category->name;
                    $menu->link = $slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('category.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Category::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.category.trash', compact('list'));
    }


    public function status($id)
    {
        $category = Category::find($id);
        $category->status = ($category->status==2)?1:2;
        $category->save();
        return redirect()->route('category.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển trạng thái thành công!"]);
    }
    public function deltrash($id)
    {
        $category = Category::find($id);
        if($category == null)
        {
        return redirect()->route('category.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $category->status = 0;
        $category->save();
        return redirect()->route('category.index');
    }

    public function retrash($id)
    {
        $category = Category::find($id);
        $category->status = 2;
        $category->save();
        return redirect()->route('category-trash');
    }
}
