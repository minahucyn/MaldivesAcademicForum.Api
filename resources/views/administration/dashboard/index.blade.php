@extends('layouts.admin')
@section('title','Dashboard')
@section('content')

<div class="container p-4">
  <h1>Welcome to the dashboard</h1>
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

    $("#dashboard").addClass("active")
    $("#dashboard").attr('aria-current', 'page')

  });
</script>
@endsection