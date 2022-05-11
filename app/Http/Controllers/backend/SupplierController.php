<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Str;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Supplier::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.supplier.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $supplier->slug = $slug;
        $supplier->metakey = $request->metakey;
        $supplier->metadesc = $request->metadesc;
        $supplier->siteurl = $request->siteurl;
        $supplier->fullname = $request->fullname;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->created_by = 1;
        if($request->hasFile('logo'))
        {
            $path_dir = "images/supplier/";
            $file = $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $supplier->logo = $fileName;
            if($supplier->save())
            {
                $link = new Link();
                $link->slug = $slug;
                $link->tableid = $supplier->id;
                $link->type = 'supplier';
                $link->save();
            }
            return redirect()->route('supplier.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
        }
        else{
            return redirect()->route('supplier.index')->with('message',['typemsg' => "danger",'msg' => "Phải thêm logo!"]);

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
        $supplier = Supplier::find($id);
        return view('backend.supplier.show', compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $list_supplier = Supplier::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.supplier.edit', compact('list_supplier','supplier'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $supplier->slug = $slug;
        $supplier->metakey = $request->metakey;
        $supplier->metadesc = $request->metadesc;
        $supplier->siteurl = $request->siteurl;
        $supplier->fullname = $request->fullname;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_by = 1;
        if($request->hasFile('logo'))
        {
            $path_dir = "images/supplier/";
            $file = $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $supplier->logo = $fileName;
           
        }
        if($supplier->save())
        {
            $link = Link::where([['tableid', '=', $id], ['type', '=', 'supplier']])->first();
            if($link!=null)
            {
                $link->slug = $slug;
                $link->save();
            }
            $list_menu = Menu::where([['tableid', '=', $id], ['type', '=', 'supplier']])->get();
            if(count($list_menu) > 0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name = $supplier->name;
                    $menu->link = $slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('supplier.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Supplier::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.supplier.trash', compact('list'));
    }


    public function status($id)
    {
        $supplier = Supplier::find($id);
        $supplier->status = ($supplier->status==2)?1:2;
        $supplier->save();
        return redirect()->route('supplier.index');
    }
    public function deltrash($id)
    {
        $supplier = Supplier::find($id);
        if($supplier == null)
        {
        return redirect()->route('supplier.index')->with('message',['typemsg' => "success",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $supplier->status = 0;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển vào thùng rác!"]);;
    }

    public function retrash($id)
    {
        $supplier = Supplier::find($id);
        $supplier->status = 2;
        $supplier->save();
        return redirect()->route('supplier-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục nhà cung cấp!"]);
    }
}
