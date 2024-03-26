<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
//        $cats = Category::paginate(6);
        return view('Backoffice.category');
    }
}
