<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class FaqController extends Controller
{
  public function index()
  {
    return view('administration.faq.index');
  }
}
