<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_MainApp extends Controller
{

    public function dashboard()
    {
        return view('main_app.dashboard');
    }

    public function beranda()
    {
        return view('main_app.beranda');
    }
}
