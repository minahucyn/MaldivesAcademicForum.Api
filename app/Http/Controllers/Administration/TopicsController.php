<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Topics;
use App\Models\Speakers;
use App\Models\Conferences;
use App\Http\Requests\Topics\TopicCreateRequest;
use App\Http\Requests\Topics\TopicUpdateRequest;


class TopicsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

  public function index()
  {
    $speakers = Speakers::all();
    $conferences = Conferences::all();
    $topics = Topics::all();
    return view('administration.topics.index', compact('topics', 'speakers', 'conferences'));
  }

  public function create()
  {
    $speakers = Speakers::all();
    $conferences = Conferences::all();

    return view('administration.topics.create', compact('speakers', 'conferences'));
  }

  public function store(TopicCreateRequest $request)
  {
    $topic = new Topics();
    $topic->Description = $request->get('Description');
    $topic->Location = $request->get('Location');
    $topic->StartDate = $request->get('StartDate');
    $topic->EndDate = $request->get('EndDate');
    $topic->ConferenceId = $request->get('ConferenceId');
    $topic->SpeakerId = $request->get('SpeakerId');
    $topic->save();

    $notification = array(
      'message' => 'Topic created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/topics')->with($notification);
  }

  public function edit($id)
  {
    $speakers = Speakers::all();
    $conferences = Conferences::all();
    $topic = Topics::findOrFail($id);
    return view('administration.topics.update', compact('topic', 'speakers', 'conferences'));
  }

  public function update(TopicUpdateRequest $request, $id)
  {
    $topic = Topics::findOrFail($id);
    $topic->Description = $request->get('Description');
    $topic->Location = $request->get('Location');
    $topic->StartDate = $request->get('StartDate');
    $topic->EndDate = $request->get('EndDate');
    $topic->ConferenceId = $request->get('ConferenceId');
    $topic->SpeakerId = $request->get('SpeakerId');
    $topic->save();

    $notification = array(
      'message' => 'Topic updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/topics')->with($notification);
  }

  public function destroy($id)
  {
    if (Topics::findOrFail($id)) {
      Topics::destroy($id);
      $notification = array(
        'message' => 'Topic removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/topics')->with($notification);
    }

    return redirect('/admin/topics');
  }
}
