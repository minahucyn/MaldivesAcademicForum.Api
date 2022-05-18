<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class ConferencesController extends Controller
{
  public function index()
  {
    return view('administration.conferences.index');
  }
}
