<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class SpeakersController extends Controller
{
  public function index()
  {
    return view('administration.speakers.index');
  }
}
