<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Speakers;
use App\Http\Requests\Speakers\SpeakerCreateRequest;
use App\Http\Requests\Speakers\SpeakerUpdateRequest;


class SpeakersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

  public function index()
  {
    $speakers = Speakers::all();
    return view('administration.speakers.index', compact('speakers'));
  }

  public function create()
  {
    return view('administration.speakers.create');
  }

  public function store(SpeakerCreateRequest $request)
  {
    $speaker = new Speakers();
    $speaker->Fullname = $request->get('Fullname');
    $speaker->Description = $request->get('Description');
    $speaker->Designation = $request->get('Designation');
    $speaker->save();

    $notification = array(
      'message' => 'Speaker created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/speakers')->with($notification);
  }

  public function edit($id)
  {
    $speaker = Speakers::findOrFail($id);
    return view('administration.speakers.update', compact('speaker'));
  }

  public function update(SpeakerUpdateRequest $request, $id)
  {
    $speaker = Speakers::findOrFail($id);
    $speaker->Fullname = $request->get('Fullname');
    $speaker->Description = $request->get('Description');
    $speaker->Designation = $request->get('Designation');
    $speaker->save();

    $notification = array(
      'message' => 'Speaker updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/speakers')->with($notification);
  }

  public function destroy($id)
  {
    if (Speakers::findOrFail($id)) {
      Speakers::destroy($id);
      $notification = array(
        'message' => 'Speaker removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/speakers')->with($notification);
    }

    return redirect('/admin/speakers');
  }
}
