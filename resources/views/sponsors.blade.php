@extends('layouts.landing')
@section('title','Sponsors')
@section('content')

<div class="d-flex justify-content-center">
  <h1>Sponsors</h1>
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

    $("#sponsors").addClass("active")
  });
</script>
@endsection