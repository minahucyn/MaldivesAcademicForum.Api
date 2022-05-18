<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class TopicsController extends Controller
{
  public function index()
  {
    return view('administration.topics.index');
  }
}
