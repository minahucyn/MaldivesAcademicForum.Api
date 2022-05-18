@extends('layouts.admin')
@section('title','Speakers')
@section('content')

<div class="container p-4">
  <h1>Speakers</h1>
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

    $("#speakers").addClass("active")
    $("#speakers").attr('aria-current', 'page')

  });
</script>
@endsection