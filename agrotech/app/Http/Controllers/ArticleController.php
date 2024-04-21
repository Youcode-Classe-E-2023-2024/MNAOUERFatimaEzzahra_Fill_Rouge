<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $cats = Category::all();
        return view('createArticle',['cats'=>$cats]);
    }

//    article backoffice
    public function index()
    {
        return view('Backoffice.article');
    public function indexUser()
    {
        $articles = Article::paginate(12);
        return view('articles', ['articles' => $articles]);
    }
}
