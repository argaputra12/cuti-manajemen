<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'content' => 'Ini adalah halaman login'
        ]);
    }
}
