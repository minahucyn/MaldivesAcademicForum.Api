<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Conferences;


class ConferencesController extends Controller
{
  public function index()
  {
    $conferences = Conferences::all();
    return view('administration.conferences.index', compact('conferences'));
  }
}
