@extends('layouts.admin')
@section('title','Education Levels')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($levels as $level)
    <tr>
      <th scope="row">{{ $level->Id }}</th>
      <td>{{ $level->Description }}</td>
      <td>
        <a class="btn btn-warning" href="#">Edit</a>
        <a class="btn btn-danger" href="#">Delete</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3">No Education Levels</td>
    </tr>
    @endforelse
  </tbody>
</table>

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

    $("#education-levels").addClass("active")
    $("#education-levels").attr('aria-current', 'page')

  });
</script>
@endsection