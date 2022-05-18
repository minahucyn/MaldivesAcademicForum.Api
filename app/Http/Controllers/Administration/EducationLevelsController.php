<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\EducationLevels;


class EducationLevelsController extends Controller
{
  public function index()
  {
    $levels = EducationLevels::all();
    return view('administration.educationlevels.index', compact('levels'));
  }
}
