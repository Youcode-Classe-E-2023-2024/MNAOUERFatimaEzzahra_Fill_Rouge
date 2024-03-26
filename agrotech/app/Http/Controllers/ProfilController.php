<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
//        $users = User::paginate(3);
        return view('Backoffice.user');
    }
}
