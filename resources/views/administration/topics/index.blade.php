@extends('layouts.admin')
@section('title','Topics')
@section('content')

<div class="container p-4">
  <h1>Topics</h1>
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

    $("#topics").addClass("active")
    $("#topics").attr('aria-current', 'page')

  });
</script>
@endsection