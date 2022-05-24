<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Conferences;
use App\Http\Requests\Conferences\ConferenceCreateRequest;
use App\Http\Requests\Conferences\ConferenceUpdateRequest;


class ConferencesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

  public function index()
  {
    $conferences = Conferences::all();
    return view('administration.conferences.index', compact('conferences'));
  }

  public function create()
  {
    return view('administration.conferences.create');
  }

  public function store(ConferenceCreateRequest $request)
  {
    $conference = new Conferences();
    $conference->Description = $request->get('Description');
    $conference->Venue = $request->get('Venue');
    $conference->RegistrationStartDate = $request->get('RegistrationStartDate');
    $conference->RegistrationEndDate = $request->get('RegistrationEndDate');
    $conference->StartDate = $request->get('StartDate');
    $conference->EndDate = $request->get('EndDate');
    $conference->save();

    $notification = array(
      'message' => 'Conference created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/conferences')->with($notification);
  }

  public function edit($id)
  {
    $conference = Conferences::findOrFail($id);
    return view('administration.conferences.update', compact('conference'));
  }

  public function update(ConferenceUpdateRequest $request, $id)
  {
    $conference = Conferences::findOrFail($id);
    $conference->Description = $request->get('Description');
    $conference->Venue = $request->get('Venue');
    $conference->RegistrationStartDate = $request->get('RegistrationStartDate');
    $conference->RegistrationEndDate = $request->get('RegistrationEndDate');
    $conference->StartDate = $request->get('StartDate');
    $conference->EndDate = $request->get('EndDate');
    $conference->save();

    $notification = array(
      'message' => 'Conference updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/conferences')->with($notification);
  }

  public function destroy($id)
  {
    if (Conferences::findOrFail($id)) {
      Conferences::destroy($id);
      $notification = array(
        'message' => 'Conference removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/conferences')->with($notification);
    }

    return redirect('/admin/conferences');
  }
}
