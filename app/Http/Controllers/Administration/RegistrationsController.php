<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class RegistrationsController extends Controller
{
  public function index()
  {
    return view('administration.registrations.index');
  }
}
