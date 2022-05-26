@extends('layouts.landing')
@section('title','FAQ')
@section('content')

<section class="container mt-5 mb-5">
  <h1>Frequently Asked Questions</h1>
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
        </div>
      </div>
    </div>
    @empty
    <h4 class="text-center">No FAQs</h4>
    @endforelse

  </div>
</section>


@endsection


@section('scripts')
<script>
  //setNav("#about")
  $(function() {
    let items = $("#nav > li > a.active")
    for (let index = 0; index < items.length; index++) {
      const element = items[index]
      $(element).removeClass('active')
    }

    $("#faqs").addClass("active")
  });
</script>
@endsection