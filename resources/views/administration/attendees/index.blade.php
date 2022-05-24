@extends('layouts.admin')
@section('title','Attendees')
@section('content')

<div class="container p-4">
  <h1>Attendees</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/attendees/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Full name</th>
        <th scope="col" class="text-center">NID // PP</th>
        <th scope="col" class="text-center">Date of Birth</th>
        <th scope="col" class="text-center">Contact Number</th>
        <th scope="col" class="text-center">Email</th>
        <th scope="col" class="text-center">Education Level</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($attendees as $attendee)
      <tr>
        <th scope="row">{{ $attendee->Id }}</th>
        <td>{{ $attendee->Fullname }}</td>
        <td class="text-center">{{ $attendee->NidPp }}</td>
        <td class="text-center">{{ date('d-m-Y', strtotime( $attendee->Birthdate))}}</td>
        <td class="text-center">{{ $attendee->ContactNumber }}</td>
        <td class="text-center">{{ $attendee->Email }}</td>
        <td class="text-center">
          @foreach($levels as $level)
          @if($attendee->EducationId==$level->Id)
          {{$level->Description}}
          @endif
          @endforeach
        </td>
        <td class="text-center">
          <a class="btn btn-warning" href="/admin/attendees/edit/{{ $attendee->Id }}">Edit</a>
          <a class="btn btn-danger" onclick="deleteAttendee('{{ $attendee->Id }}')">Delete</a>

          <form action="/admin/attendees/destroy/{{ $attendee->Id }}" method="POST" id="attendee-form-{{ $attendee->Id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
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

  function deleteAttendee(id) {
    let res = confirm('Are you sure you want to delete this attendee?');
    if (res) {
      const target = `#attendee-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection