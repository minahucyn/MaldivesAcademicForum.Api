@extends('layouts.landing')
@section('title','Speakers')
@section('content')

<div class="d-flex justify-content-center">
  <h1>Speakers</h1>
</div>

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

    $("#speakers").addClass("active")
  });
</script>
@endsection