<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Product::where('products.status','!=',0)
        ->join('category', 'category.id', '=', 'products.catid')
        ->join('suppliers', 'suppliers.id', '=', 'products.suppid')
        ->orderby('products.created_at','desc')
        ->select("products.id", "products.img", "products.name", "products.created_at", "products.status", "category.name as catname", "suppliers.name as suppname")
        ->get();


        return view('backend.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list_product = Product::where('status','!=',0)->orderby('created_at','desc')->get();
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        $list_supplier = Supplier::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.product.create', compact('list_category', 'list_supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $product = new Product();
        $product->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $product->slug = $slug;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->catid = $request->catid;
        $product->suppid = $request->suppid;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->created_by = 1;

        if($request->hasFile('img'))
        {
            $path_dir = "images/products/";

            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);

            $file2 = $request->file('img2');
            $fileName2 = $slug.$file2->getClientOriginalName();
            $filePath = $file2->move($path_dir, $fileName2);

            $file3 = $request->file('img3');
            $fileName3 = $slug.$file3->getClientOriginalName();
            $filePath = $file3->move($path_dir, $fileName3);

            $file4 = $request->file('img4');
            $fileName4 = $slug.$file4->getClientOriginalName();
            $filePath = $file4->move($path_dir, $fileName4);

            $product->img = $fileName;
            $product->img2 = $fileName2;
            $product->img3 = $fileName3;
            $product->img4 = $fileName4;
            $product->save();
            return redirect()->route('product.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
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
        $product = Product::find($id);
        $category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        $supplier = Supplier::where('status','!=',0)->orderby('created_at','desc')->get();
        $users = User::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.product.show', compact('product', 'category', 'supplier', 'users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        $list_supplier = Supplier::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.product.edit', compact('list_category', 'list_supplier', 'product'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $product = Product::find($id);
        $product->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $product->slug = $slug;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->catid = $request->catid;
        $product->suppid = $request->suppid;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->updated_by = 1;

        if($request->hasFile('img'))
        {
            $path_dir = "images/products/";

            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);

            $file2 = $request->file('img2');
            $fileName2 = $slug.$file2->getClientOriginalName();
            $filePath = $file2->move($path_dir, $fileName2);

            $file3 = $request->file('img3');
            $fileName3 = $slug.$file3->getClientOriginalName();
            $filePath = $file3->move($path_dir, $fileName3);

            $file4 = $request->file('img4');
            $fileName4 = $slug.$file4->getClientOriginalName();
            $filePath = $file4->move($path_dir, $fileName4);

            $product->img = $fileName;
            $product->img2 = $fileName2;
            $product->img3 = $fileName3;
            $product->img4 = $fileName4;
        }
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product-trash')->with('message',['typemsg' => "succes",'msg' => "Thêm thành công!"]);

    }

    public function trash()
    {
        $list = Product::where('products.status','=',0)
        ->join('category', 'category.id', '=', 'products.catid')
        ->join('suppliers', 'suppliers.id', '=', 'products.suppid')
        ->orderby('products.created_at','desc')
        ->select("products.id", "products.img", "products.name", "products.created_at", "products.status", "category.name as catname", "suppliers.name as suppname")
        ->get();
        return view('backend.product.trash', compact('list'));
    }


    public function status($id)
    {
        $product = Product::find($id);
        $product->status = ($product->status==2)?1:2;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển trạng thái thành công!"]);
    }
    public function deltrash($id)
    {
        $product = Product::find($id);
        if($product == null)
        {
        return redirect()->route('product.index')->with('message',['typemsg' => "success",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $product->status = 0;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển vào thùng rác!"]);;
    }

    public function retrash($id)
    {
        $product = Product::find($id);
        $product->status = 2;
        $product->save();
        return redirect()->route('product-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục sản phẩm!"]);
    }
}
