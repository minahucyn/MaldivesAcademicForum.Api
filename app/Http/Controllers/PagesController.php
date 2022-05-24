<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevels;
use App\Models\Conferences;

class PagesController extends Controller
{
    public function index()
    {
        $educationIds = EducationLevels::all();
        $conferenceIds = Conferences::all();

        return view('index', compact('educationIds', 'conferenceIds'));
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
