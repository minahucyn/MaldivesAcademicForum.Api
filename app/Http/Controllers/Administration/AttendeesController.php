<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Attendee;


class AttendeesController extends Controller
{
  public function index()
  {
    $attendees = Attendee::all();
    return view('administration.attendees.index', compact('attendees'));
  }
}
