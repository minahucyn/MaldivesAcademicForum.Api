@extends('layouts.admin')
@section('title','Attendees')
@section('content')

<div class="container p-4">
  <h1>Attendees</h1>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Full name</th>
        <th scope="col">NID // PP</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Email</th>
        <th scope="col">Education Level</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($attendees as $attendee)
      <tr>
        <th scope="row">{{ $attendee->Id }}</th>
        <td>{{ $attendee->Fullname }}</td>
        <td>{{ $attendee->NidPp }}</td>
        <td>{{ $attendee->Birthdate }}</td>
        <td>{{ $attendee->ContactNumber }}</td>
        <td>{{ $attendee->Email }}</td>
        <td>{{ $attendee->EducationId }}</td>
        <td>
          <a class="btn btn-warning" href="#">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center">No Attendees</td>
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

    $("#attendees").addClass("active")
    $("#attendees").attr('aria-current', 'page')

  });
</script>
@endsection