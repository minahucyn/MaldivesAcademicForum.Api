<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

  public function index()
  {
    return view('administration.dashboard.index');
  }
}
