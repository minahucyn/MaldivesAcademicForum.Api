@extends('layouts.admin')
@section('title','FAQ')
@section('content')

<div class="container p-4">
  <h1>Frequently Asked Questions</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/faqs/create" class="btn btn-primary">Create</a>
  </div>
  <div class="accordion mt-4" id="accordionPanelsStayOpenExample">
    @forelse ($faqs as $faq)
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-heading{{ $faq->id }}">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $faq->id }}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{ $faq->id }}">
          <strong>{{ $faq->Question }}</strong>
        </button>
      </h2>
      <div id="panelsStayOpen-collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{ $faq->id }}">
        <div class="accordion-body">
          <div>
            {{ $faq->Answer }}
          </div>
          <div class="mt-3">
            <a href="/admin/faqs/edit/{{ $faq->id }}" class="btn btn-warning">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
    @empty
    <h4 class="text-center">No FAQs</h4>
    @endforelse

  </div>


  @endsection

  @section('scripts')
  <script>
    $(function() {
      let items = $("#nav > li > a.active")
      for (let index = 0; index < items.length; index++) {
        const element = items[index]
        $(element).removeClass('active')
        $(element).removeAttr('aria-current')
      }

      $("#faq").addClass("active")
      $("#faq").attr('aria-current', 'page')

    });
  </script>
  @endsection