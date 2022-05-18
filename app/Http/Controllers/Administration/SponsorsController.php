<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Sponsors;


class SponsorsController extends Controller
{
  public function index()
  {
    $sponsors = Sponsors::all();
    return view('administration.sponsors.index', compact('sponsors'));
  }
}
