<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use App\Http\Requests\Faqs\FaqCreateRequest;
use App\Http\Requests\Faqs\FaqUpdateRequest;


class FaqController extends Controller
{
  public function index()
  {
    $faqs = Faqs::all();
    return view('administration.faq.index', compact('faqs'));
  }

  public function create()
  {
    return view('administration.faq.create');
  }

  public function store(FaqCreateRequest $request)
  {
    $faq = new Faqs();
    $faq->Question = $request->get('Question');
    $faq->Answer = $request->get('Answer');
    $faq->save();

    $notification = array(
      'message' => 'FAQ created successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/faqs')->with($notification);
  }

  public function edit($id)
  {
    $faq = Faqs::findOrFail($id);
    return view('administration.faq.update', compact('faq'));
  }

  public function update(FaqUpdateRequest $request, $id)
  {
    $faq = Faqs::findOrFail($id);
    $faq->Question = $request->get('Question');
    $faq->Answer = $request->get('Answer');
    $faq->save();

    $notification = array(
      'message' => 'Faq updated successfully',
      'alert-type' => 'success'
    );

    return redirect('/admin/faqs')->with($notification);
  }

  public function destroy($id)
  {
    if (Faqs::findOrFail($id)) {
      Faqs::destroy($id);
      $notification = array(
        'message' => 'Faq removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/faqs')->with($notification);
    }

    return redirect('/admin/faqs');
  }
}
