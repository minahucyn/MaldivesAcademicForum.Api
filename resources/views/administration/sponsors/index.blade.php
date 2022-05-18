@extends('layouts.admin')
@section('title','Sponsors')
@section('content')

<div class="container p-4">
  <h1>Sponsors</h1>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Description</th>
        <th scope="col">LogoUri</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($sponsors as $sponsor)
      <tr>
        <th scope="row">{{ $sponsor->Id }}</th>
        <td>{{ $speaker->Description }}</td>
        <td>{{ $speaker->LogoUri }}</td>
        <td>
          <a class="btn btn-warning" href="#">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Sponsors</td>
      </tr>
      @endforelse
    </tbody>
  </table>
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

    $("#sponsors").addClass("active")
    $("#sponsors").attr('aria-current', 'page')

  });
</script>
@endsection