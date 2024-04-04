<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function create()
    {
        $cats = Category::all();
        return view('articleDetail', ['cats' => $cats]);
    }

    public function index()
    {
        $cats = Category::all();
        return view('favorite', ['cats' => $cats]);
    }
}
