<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Registrations;
use App\Models\Conferences;
use App\Models\Attendees;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Registrations\RegistrationCreateRequest;
use App\Http\Requests\Registrations\RegistrationUpdateRequest;
use Ramsey\Uuid\Uuid;


class RegistrationsController extends Controller
{
  public function index()
  {
    $attendees = Attendees::all();
    $conferences = Conferences::all();
    $registrations = Registrations::all();
    return view('administration.registrations.index', compact('attendees', 'conferences', 'registrations'));
  }

  public function create()
  {
    $attendees = Attendees::all();
    $conferences = Conferences::all();
    return view('administration.registrations.create', compact('attendees', 'conferences'));
  }

  public function store(RegistrationCreateRequest $request)
  {
    $registered = Registrations::where(
      [
        ['AttendeeId', '=', $request->get('AttendeeId')],
        ['ConferenceId', '=', $request->get('ConferenceId')]
      ]
    )->get();

    if (count($registered) < 1) {
      $registration = new Registrations();

      $registration->AttendeeId = $request->get('AttendeeId');
      $registration->ConferenceId = $request->get('ConferenceId');
      $registration->IsApproved = $request->get('IsApproved');

      $uuid = Uuid::uuid4();
      $file = $request->file('PaymentSlipPath');
      $file_name = time() . $file->getClientOriginalName();
      $file_path = 'uploads/payment-slips';
      $file->move($file_path, $file_name);
      $registration->PaymentSlipPath =  $file_path . '/' . $file_name;
      $registration->PaymentSlipName =  $uuid;
      $registration->save();

      $notification = array(
        'message' => 'Successfully registered the attendee for the conference.',
        'alert-type' => 'success'
      );
      return redirect('/admin/registrations')->with($notification);
    } else {
      $notification = array(
        'message' => 'The attendee is already registered to the conference.',
        'alert-type' => 'warning'
      );

      return redirect('/admin/registrations/create')->with($notification);
    }
  }

  public function edit($id)
  {
    $attendees = Attendees::all();
    $conferences = Conferences::all();
    $registration = Registrations::findOrFail($id);
    return view('administration.registrations.update', compact('registration', 'attendees', 'conferences'));
  }

  public function update(RegistrationUpdateRequest $request, $id)
  {
    $registered = Registrations::where(
      [
        ['Id', '<>', $id],
        ['AttendeeId', '=', $request->get('AttendeeId')],
        ['ConferenceId', '=', $request->get('ConferenceId')]
      ]
    )->get();

    if (count($registered) < 1) {

      $registration = Registrations::findOrFail($id);

      $registration->AttendeeId = $request->get('AttendeeId');
      $registration->ConferenceId = $request->get('ConferenceId');
      $registration->IsApproved = $request->get('IsApproved');

      if ($request->hasFile('PaymentSlipPath')) {
        $uuid = Uuid::uuid4();
        $file = $request->file('PaymentSlipPath');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'uploads/payment-slips';
        $file->move($file_path, $file_name);
        File::delete($registration->PaymentSlipPath);
        $registration->PaymentSlipPath =  $file_path . '/' . $file_name;
        $registration->PaymentSlipName =  $uuid;
      }

      $registration->save();

      $notification = array(
        'message' => 'Successfully updated the registration.',
        'alert-type' => 'success'
      );
      return redirect('/admin/registrations')->with($notification);
    } else {
      $notification = array(
        'message' => 'The attendee is already registered to the conference.',
        'alert-type' => 'warning'
      );

      return redirect('/admin/registrations/create')->with($notification);
    }
  }

  public function destroy($id)
  {
    if (Registrations::findOrFail($id)) {
      Registrations::destroy($id);
      $notification = array(
        'message' => 'Registration removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/registrations')->with($notification);
    }

    return redirect('/admin/registrations');
  }
}
