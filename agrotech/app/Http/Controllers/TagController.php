<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
//        $cats = Category::paginate(6);
        return view('Backoffice.tag');
    }
}
