<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Sponsors;
use App\Http\Requests\Sponsors\SponsorCreateRequest;
use App\Http\Requests\Sponsors\SponsorUpdateRequest;


class SponsorsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except('show');
  }

  public function index()
  {
    $sponsors = Sponsors::all();
    return view('administration.sponsors.index', compact('sponsors'));
  }

  public function create()
  {
    return view('administration.sponsors.create');
  }

  public function store(SponsorCreateRequest $request)
  {
    $sponsor = new Sponsors();
    $sponsor->LogoUri = $request->get('LogoUri');
    $sponsor->Description = $request->get('Description');
    $sponsor->save();

    $notification = array(
      'message' => 'Sponsor created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/sponsors')->with($notification);
  }

  public function edit($id)
  {
    $sponsor = Sponsors::findOrFail($id);
    return view('administration.sponsors.update', compact('sponsor'));
  }

  public function update(SponsorUpdateRequest $request, $id)
  {
    $sponsor = Sponsors::findOrFail($id);
    $sponsor->LogoUri = $request->get('LogoUri');
    $sponsor->Description = $request->get('Description');
    $sponsor->save();

    $notification = array(
      'message' => 'Sponsor updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/sponsors')->with($notification);
  }

  public function destroy($id)
  {
    if (Sponsors::findOrFail($id)) {
      Sponsors::destroy($id);
      $notification = array(
        'message' => 'Sponsor removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/sponsors')->with($notification);
    }

    return redirect('/admin/sponsors');
  }
}
