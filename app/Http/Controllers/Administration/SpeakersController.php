<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Speakers;


class SpeakersController extends Controller
{
  public function index()
  {
    $speakers = Speakers::all();
    return view('administration.speakers.index', compact('speakers'));
  }
}
