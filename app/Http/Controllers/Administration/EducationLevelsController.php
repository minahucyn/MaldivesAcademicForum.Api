<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\EducationLevels;
use App\Http\Requests\EducationLevels\EducationLevelCreateRequest;
use App\Http\Requests\EducationLevels\EducationLevelUpdateRequest;



class EducationLevelsController extends Controller
{
  public function index()
  {
    $levels = EducationLevels::all();
    return view('administration.educationlevels.index', compact('levels'));
  }

  public function create()
  {
    return view('administration.educationlevels.create');
  }

  public function store(EducationLevelCreateRequest $request)
  {
    $level = new EducationLevels();
    $level->Description = $request->get('Description');
    $level->save();

    $notification = array(
      'message' => 'Education level created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/education-levels')->with($notification);
  }

  public function edit($id)
  {
    $level = EducationLevels::findOrFail($id);
    return view('administration.educationlevels.update', compact('level'));
  }

  public function update(EducationLevelUpdateRequest $request, $id)
  {
    $level = EducationLevels::findOrFail($id);
    $level->Description = $request->get('Description');
    $level->save();

    $notification = array(
      'message' => 'Education level updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/education-levels')->with($notification);
  }
}
