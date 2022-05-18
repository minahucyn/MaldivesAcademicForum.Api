@extends('layouts.admin')
@section('title','Conferences')
@section('content')

<div class="container p-4">
  <h1>Conferences</h1>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Description</th>
        <th scope="col">Venue</th>
        <th scope="col">Registration Start Date</th>
        <th scope="col">Registration End Date</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($conferences as $conference)
      <tr>
        <th scope="row">{{ $conference->Id }}</th>
        <td>{{ $conference->Description }}</td>
        <td>{{ $conference->Venue }}</td>
        <td>{{ $conference->RegistrationStartDate }}</td>
        <td>{{ $conference->RegistrationEndDate }}</td>
        <td>{{ $conference->StartDate }}</td>
        <td>{{ $conference->EndDate }}</td>
        <td>
          <a class="btn btn-warning" href="#">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Conferences</td>
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

    $("#conferences").addClass("active")
    $("#conferences").attr('aria-current', 'page')

  });
</script>
@endsection