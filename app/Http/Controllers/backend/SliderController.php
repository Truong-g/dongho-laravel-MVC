<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Support\Str;


class SliderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Slider::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.slider.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_slider = Slider::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.slider.create', compact("list_slider"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $slider = new Slider();
        $slider->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $slider->url = $request->url;
        $slider->orders = $request->orders;
        $slider->position = $request->position;
        $slider->created_by = 1;
        $slider->status = $request->status;
        if($request->hasFile('img'))
        {
            $path_dir = "images/slider/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $slider->img = $fileName;
            if($slider->save())
            {
                $link = new Link();
                $link->slug = $slug;
                $link->tableid = $slider->id;
                $link->type = 'slider';
                $link->save();
            }
            return redirect()->route('slider.index')->with('message',['typemsg' => "success",'msg' => "Thêm thành công!"]);
        }
        else{
            return redirect()->route('slider.index')->with('message',['typemsg' => "danger",'msg' => "Phải thêm hình ảnh!"]);
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
        $slider = Slider::find($id);
        $list_slider = Slider::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.slider.edit', compact('list_slider','slider'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $slider = Slider::find($id);
        $slider->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $slider->url = $request->url;
        $slider->orders = $request->orders;
        $slider->position = $request->position;
        $slider->updated_by = 1;
        $slider->status = $request->status;
        if($request->hasFile('img'))
        {
            $path_dir = "images/slider/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filePath = $file->move($path_dir, $fileName);
            $slider->img = $fileName;
           
        }
        if($slider->save())
        {
            $link = Link::where([['tableid', '=', $id], ['type', '=', 'slider']])->first();
            if($link!=null)
            {
                $link->slug = $slug;
                $link->save();
            }
            $list_menu = Menu::where([['tableid', '=', $id], ['type', '=', 'slider']])->get();
            if(count($list_menu) > 0)
            {
                foreach($list_menu as $menu)
                {
                    $menu->name = $slider->name;
                    $menu->link = $slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('slider.index')->with('message',['typemsg' => "success",'msg' => "Cập nhập thành công!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('slider-trash')->with('message',['typemsg' => "success",'msg' => "Xóa thành công!"]);

    }

    public function trash()
    {
        $list = Slider::where('status','==',0)->orderby('created_at','desc')->get();
        return view('backend.slider.trash', compact('list'));
    }


    public function status($id)
    {
        $slider = Slider::find($id);
        $slider->status = ($slider->status==2)?1:2;
        $slider->save();
        return redirect()->route('slider.index');
    }
    public function deltrash($id)
    {
        $slider = Slider::find($id);
        if($slider == null)
        {
        return redirect()->route('slider.index')->with('message',['typemsg' => "success",'msg' => "Mẫu tin đã tồn tại!"]);
        }
        $slider->status = 0;
        $slider->save();
        return redirect()->route('slider.index')->with('message',['typemsg' => "success",'msg' => "Đã chuyển vào thùng rác!"]);
    }

    public function retrash($id)
    {
        $slider = Slider::find($id);
        $slider->status = 2;
        $slider->save();
        return redirect()->route('slider-trash')->with('message',['typemsg' => "success",'msg' => "Đã khôi phục slider!"]);
    }
}
