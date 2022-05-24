<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Attendees;
use App\Models\EducationLevels;
use App\Models\Registrations;
use Illuminate\http\Request;
use App\Http\Requests\Attendees\AttendeeCreateRequest;
use App\Http\Requests\Attendees\AttendeeUpdateRequest;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\DB;


class AttendeesController extends Controller
{
  public function index()
  {
    $attendees = Attendees::all();
    $levels = EducationLevels::all();
    return view('administration.attendees.index', compact('attendees', 'levels'));
  }

  public function create()
  {
    $levels = EducationLevels::all();
    return view('administration.attendees.create', compact('levels'));
  }

  public function store(AttendeeCreateRequest $request)
  {
    $existingAttendee = Attendees::where('Email', '=', $request->get('Email'))->get();

    if (count($existingAttendee) < 1) {
      $attendee = new Attendees();
      $attendee->Fullname = $request->get('Fullname');
      $attendee->NidPp = $request->get('NidPp');
      $attendee->Birthdate = $request->get('Birthdate');
      $attendee->Email = strtolower($request->get('Email'));
      $attendee->ContactNumber = $request->get('ContactNumber');

      $educationLevel = EducationLevels::find($request->get('EducationId'));
      $attendee->EducationId = $educationLevel->Id;

      $attendee->save();

      $notification = array(
        'message' => 'Attendee created successfully',
        'alert-type' => 'success'
      );

      return redirect('/admin/attendees')->with($notification);
    } else {
      $notification = array(
        'message' => 'There already exists an attendee with the same email.',
        'alert-type' => 'warning'
      );

      return redirect('/admin/attendees/create')->with($notification);
    }
  }

  public function edit($id)
  {
    $attendee = Attendees::findOrFail($id);
    $levels = EducationLevels::all();
    return view('administration.attendees.update', compact('attendee', 'levels'));
  }

  public function update(AttendeeUpdateRequest $request, $id)
  {
    $existingAttendee = Attendees::where(
      [
        ['Id', '<>', $id],
        ['Email', '=', strtolower($request->get('Email'))]
      ]
    )->get();

    if (count($existingAttendee) < 1) {

      $attendee = Attendees::findOrFail($id);
      $attendee->Fullname = $request->get('Fullname');
      $attendee->NidPp = $request->get('NidPp');
      $attendee->Birthdate = $request->get('Birthdate');
      $attendee->Email = strtolower($request->get('Email'));
      $attendee->ContactNumber = $request->get('ContactNumber');

      $educationLevel = EducationLevels::find($request->get('EducationId'));
      $attendee->EducationId = $educationLevel->Id;

      $attendee->save();

      $notification = array(
        'message' => 'Attendee updated successfully',
        'alert-type' => 'success'
      );

      return redirect('/admin/attendees')->with($notification);
    } else {
      $notification = array(
        'message' => 'There already exists an attendee with the same email.',
        'alert-type' => 'warning'
      );

      return redirect('/admin/attendees/edit/' . $id)->with($notification);
    }
  }

  public function destroy($id)
  {
    if (Attendees::findOrFail($id)) {
      Attendees::destroy($id);
      $notification = array(
        'message' => 'Attendance removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/attendees')->with($notification);
    }

    return redirect('/admin/attendees');
  }
}
