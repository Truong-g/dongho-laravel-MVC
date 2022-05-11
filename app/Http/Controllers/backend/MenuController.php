<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Supplier;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;



class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Menu::where('status','!=',0)->get();
        $list_category = Category::where('status','!=',0)->get();
        $list_topic = Topic::where('status','!=',0)->get();
        $list_page = Post::where([['status','!=',0], ['posttype', "=", "page"]])->get();
        $list_supplier = Supplier::where('status','!=',0)->get();
        return view('backend.menu.index', compact('list', 'list_category', 'list_topic', 'list_page', 'list_supplier'));
    }

    
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        
        $position = $request->position;
        $parentid = $request->parentid;
        if($request->ThemCategory)
        {
            if($request->nameCategory != null)
            {
                $list_id = $request->nameCategory;
                foreach($list_id as $id)
                {
                    $category = Category::find($id);
                    $menu = new Menu();
                    $menu->name = $category->name;
                    $menu->link = $category->slug;
                    $menu->orders = 0;
                    $menu->tableid = $category->id;
                    $menu->type = 'category';
                    $menu->parentid = $parentid;
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Chưa chọn danh mục sản phẩm!"]);
            }
           
        }
        if($request->ThemTopic)
        {
            if($request->nameTopic != null)
            {
                $list_id = $request->nameTopic;
                foreach($list_id as $id)
                {
                    $topic = Topic::find($id);
                    $menu = new Menu();
                    $menu->name = $topic->name;
                    $menu->link = $topic->slug;
                    $menu->orders = 0;
                    $menu->tableid = $topic->id;
                    $menu->type = 'topic';
                    $menu->parentid = '0';
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Chưa chọn chủ đề bài viết!"]);
            }
        } 
        if($request->ThemPage)
        {
            if($request->namePage != null)
            {
                $list_id = $request->namePage;
                foreach($list_id as $id)
                {
                    $parentid = $request->parentid;
                    $post = Post::find($id);
                    $menu = new Menu();
                    $menu->name = $post->title;
                    $menu->link = $post->slug;
                    $menu->orders = 0;
                    $menu->tableid = $post->id;
                    $menu->type = 'page';
                    $menu->parentid = $parentid;
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Chưa chọn trang đơn!"]);
            }
        } 

        if($request->ThemSupplier)
        {
            if($request->nameSupplier != null)
            {
                $list_id = $request->nameSupplier;
                foreach($list_id as $id)
                {
                    $parentid = $request->parentid;
                    $supplier = Supplier::find($id);
                    $menu = new Menu();
                    $menu->name = $supplier->name;
                    $menu->link = $supplier->slug;
                    $menu->orders = 0;
                    $menu->tableid = $supplier->id;
                    $menu->type = 'supplier';
                    $menu->parentid = $parentid;
                    $menu->position = $position;
                    $menu->created_by = 1;
                    $menu->status = 2;
                    $menu->save();
                }
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Chưa chọn nhà cung cấp"]);
            }
        } 

        if($request->ThemCustom)
        {
            if($request->name != null && $request->link != null)
            {
                $parentid = $request->parentid;
                $name = $request->name;
                $link = $request->link;
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->orders = 0;
                $menu->type = 'custom';
                $menu->parentid = $parentid;
                $menu->position = $position;
                $menu->created_by = 1;
                $menu->status = 2;
                $menu->save();
                return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Chưa điền đầy đủ thông tin!"]);

            }
           
        } 

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu-trash')->with('message',['typemsg' => "success",'msg' => "Đã xóa thành công!"]);

    }

    public function trash()
    {
        $list = Menu::where('status','==',0)->orderby('created_at','asc')->get();
        return view('backend.menu.trash', compact('list'));
    }


    public function status($id)
    {
        $menu = Menu::find($id);
        if($menu->status==2)
        {
            $menu->status = 1;
            $menu->save();
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Mẫu đã chuyển trạng thái sang xuất bản!"]);
        }
        else
        {
            $menu->status = 2;
            $menu->save();
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Mẫu đã chuyển trạng thái sang chưa xuất bản!"]);;
        }
    }
    public function deltrash($id)
    {
        $menu = Menu::find($id);
        if($menu == null)
        {
        return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $menu->status = 0;
        $menu->save();
        return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển vàothùng rác!"]);;
    }

    public function retrash($id)
    {
        $menu = Menu::find($id);
        $menu->status = 2;
        $menu->save();
        return redirect()->route('menu-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục thành công!"]);;
    }
}
