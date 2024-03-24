<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function create()
    {
        return view('articleDetail');
    }
}
