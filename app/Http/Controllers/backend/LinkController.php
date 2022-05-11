<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;


class LinkController extends Controller
{
    Public function index()
    {
        
        $list = Link::where('id','!=',-1)->orderby('created_at','desc')->get();
        return view('backend.link.index', compact('list'));
    }
}
