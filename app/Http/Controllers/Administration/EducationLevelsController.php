<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\EducationLevels;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\EducationLevels\EducationLevelCreateRequest;
use App\Http\Requests\EducationLevels\EducationLevelUpdateRequest;



class EducationLevelsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

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
    $educationLevel = EducationLevels::findOrFail($id);
    $educationLevel->Description = $request->get('Description');
    $educationLevel->save();

    $notification = array(
      'message' => 'Education level updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/education-levels')->with($notification);
  }

  public function destroy($id)
  {
    if (EducationLevels::findOrFail($id)) {
      EducationLevels::destroy($id);
      $notification = array(
        'message' => 'Education level removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/education-levels')->with($notification);
    }

    return redirect('/admin/education-levels');
  }
}
