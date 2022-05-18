<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;


class UsersController extends Controller
{
  public function index()
  {
    return view('administration.users.index');
  }
}
