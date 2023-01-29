<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user() && Auth::user()->role->role === 'admin') {
            return redirect()->route('admin');
        }
        return redirect('/');
    }
}
