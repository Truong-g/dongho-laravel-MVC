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
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Th??m th??nh c??ng!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Ch??a ch???n danh m???c s???n ph???m!"]);
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
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Th??m th??nh c??ng!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Ch??a ch???n ch??? ????? b??i vi???t!"]);
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
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Th??m th??nh c??ng!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Ch??a ch???n trang ????n!"]);
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
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Th??m th??nh c??ng!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Ch??a ch???n nh?? cung c???p"]);
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
                return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "Th??m th??nh c??ng!"]);
            }
            else
            {
                return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "Ch??a ??i???n ?????y ????? th??ng tin!"]);

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
        return redirect()->route('menu-trash')->with('message',['typemsg' => "success",'msg' => "???? x??a th??nh c??ng!"]);

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
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "M???u ???? chuy???n tr???ng th??i sang xu???t b???n!"]);
        }
        else
        {
            $menu->status = 2;
            $menu->save();
            return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "M???u ???? chuy???n tr???ng th??i sang ch??a xu???t b???n!"]);;
        }
    }
    public function deltrash($id)
    {
        $menu = Menu::find($id);
        if($menu == null)
        {
        return redirect()->route('menu.index')->with('message',['typemsg' => "danger",'msg' => "M???u tin ???? t???n t???i!"]);
        }
        $menu->status = 0;
        $menu->save();
        return redirect()->route('menu.index')->with('message',['typemsg' => "success",'msg' => "???? chuy???n v??oth??ng r??c!"]);;
    }

    public function retrash($id)
    {
        $menu = Menu::find($id);
        $menu->status = 2;
        $menu->save();
        return redirect()->route('menu-trash')->with('message',['typemsg' => "success",'msg' => "???? kh??i ph???c th??nh c??ng!"]);;
    }
}
