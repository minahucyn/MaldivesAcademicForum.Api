<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevels;

class PagesController extends Controller
{
    public function index()
    {
        $educationIds = EducationLevels::all();
        return view('index', compact('educationIds'));
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
