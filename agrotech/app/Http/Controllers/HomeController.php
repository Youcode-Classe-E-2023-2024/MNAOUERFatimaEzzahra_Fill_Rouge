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
        $articlesTendance = Article::orderBy('views', 'desc')->with(['user', 'category', 'comments'])->take(8)->get();
        $articlesNouveau = Article::orderBy('created_at', 'desc')->with(['user', 'category', 'comments'])->take(8)->get();

        return view('home', ['cats' => $cats, 'articlesTendance'=>$articlesTendance, 'articlesNouveau'=>$articlesNouveau]);
    }
}
