<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redirection()
    {
        return redirect()->route('home');
    }


    public function index()
    {
        return view('index');
    }
}
