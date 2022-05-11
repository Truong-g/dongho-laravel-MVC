<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    Public function index()
    {
        $list = Contact::where('status','!=',0)->orderby('created_at','desc')->get();
        return view('backend.contact.index', compact('list'));
    }
}
