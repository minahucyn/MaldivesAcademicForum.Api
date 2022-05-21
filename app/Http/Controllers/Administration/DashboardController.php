<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
  public function index()
  {
    return view('administration.dashboard.index');
  }
}
