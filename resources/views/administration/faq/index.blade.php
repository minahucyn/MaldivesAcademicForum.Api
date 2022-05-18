@extends('layouts.admin')
@section('title','FAQ')
@section('content')

<div class="container p-4">
  <h1>FAQ</h1>
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