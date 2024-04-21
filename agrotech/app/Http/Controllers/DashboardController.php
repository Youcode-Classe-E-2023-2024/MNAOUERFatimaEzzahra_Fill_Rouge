<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $usersCount = User::count();
        $SubscriberCount = Subscriber::count();
        $ArticleCount = Article::count();
//        dd($usersCount,$SubscriberCount,$ArticleCount);
//        $ArticleFavorisCount =
        return view('dashboard', compact('usersCount','SubscriberCount','ArticleCount'));
    }
}
