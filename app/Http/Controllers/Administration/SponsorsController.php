<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class SponsorsController extends Controller
{
  public function index()
  {
    return view('administration.sponsors.index');
  }
}
