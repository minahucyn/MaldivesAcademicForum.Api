<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function speakers()
    {
        return view('speakers');
    }

    public function sponsors()
    {
        return view('sponsors');
    }

    public function faq()
    {
        return view('faq');
    }

    public function about()
    {
        return view('about');
    }
}
