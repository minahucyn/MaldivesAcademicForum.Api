@extends('layouts.admin')
@section('title','Speakers')
@section('content')


<div class="container p-4">
  <h1>Speakers</h1>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Full name</th>
        <th scope="col">Designation</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($speakers as $speaker)
      <tr>
        <th scope="row">{{ $speaker->Id }}</th>
        <td>{{ $speaker->Fullname }}</td>
        <td>{{ $speaker->Designation }}</td>
        <td>{{ $speaker->Description }}</td>
        <td>
          <a class="btn btn-warning" href="#">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Speakers</td>
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

    $("#speakers").addClass("active")
    $("#speakers").attr('aria-current', 'page')

  });
</script>
@endsection