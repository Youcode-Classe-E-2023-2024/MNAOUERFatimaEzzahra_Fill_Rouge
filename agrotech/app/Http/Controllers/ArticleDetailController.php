<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function create()
    {
        $articles = Article::with(['user', 'category'])->find(1);
        $cats = Category::all();
        return view('articleDetail', ['articles' => $articles, 'cats' => $cats]);
    }


    public function index()
    {
        $cats = Category::all();
        return view('favorite', ['cats' => $cats]);
    }
}
