@extends('layouts.admin')
@section('title','Registrations')
@section('content')

<div class="container p-4">
  <h1>Registrations</h1>
  <div class="d-flex justify-content-end">
    <a href="#" class="btn btn-primary">Create</a>
  </div>
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

    $("#registrations").addClass("active")
    $("#registrations").attr('aria-current', 'page')

  });
</script>
@endsection