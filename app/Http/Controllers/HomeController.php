<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function user()
    {
        return auth()->user();
    }
}
