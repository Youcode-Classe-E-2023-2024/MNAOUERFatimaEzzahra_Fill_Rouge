<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
//        $articles = Article::paginate(6);
        $cats = Category::all();

        return view('home', ['cats' => $cats]);
    }
}
