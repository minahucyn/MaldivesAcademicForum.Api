<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Faqs;


class FaqController extends Controller
{
  public function index()
  {
    $faqs = Faqs::all();
    return view('administration.faq.index', compact('faqs'));
  }
}
