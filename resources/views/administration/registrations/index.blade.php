@extends('layouts.admin')
@section('title','Registrations')
@section('content')

<div class="container p-4">
  <h1>Registrations</h1>
  <div class="d-flex justify-content-end">
    <a href="/admin/registrations/create" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Attendee</th>
        <th scope="col" class="text-center">Conference</th>
        <th scope="col" class="text-center">Approval Status</th>
        <th scope="col" class="text-center">Payment Slip</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($registrations as $registration)
      <tr>
        <th scope="row">{{ $registration->Id }}</th>
        <td>
          @foreach($attendees as $attendee)
          @if($registration->AttendeeId==$attendee->Id)
          {{$attendee->Fullname}}
          @endif
          @endforeach
        </td>
        <td class="text-center">
          @foreach($conferences as $conference)
          @if($registration->ConferenceId==$conference->Id)
          {{$conference->Description}}
          @endif
          @endforeach
        </td>
        <td class="text-center">
          @if($registration->IsApproved === 0)
          {{ 'Pending' }}
          @elseif($registration->IsApproved === 1)
          {{ 'Approved' }}
          @else
          {{ 'Rejected' }}
          @endif
        </td>
        <td class="text-center">
          <a href="/{{ $registration->PaymentSlipPath }}" target="_blank">click to open</a>
        </td>
        <td class="text-center">
          <a class="btn btn-warning" href="/admin/registrations/edit/{{ $registration->Id }}">Edit</a>
          <a onclick="deleteRegistration('{{ $registration->Id }}')" class="btn btn-danger">Delete</a>

          <form action="/admin/registrations/destroy/{{ $registration->Id }}" method="POST" id="registration-form-{{ $registration->Id }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center">No Registrations</td>
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

    $("#registrations").addClass("active")
    $("#registrations").attr('aria-current', 'page')

  });

  function deleteRegistration(id) {
    let res = confirm('Are you sure you want to delete this registration?');
    if (res) {
      const target = `#registration-form-${id}`;
      $(target).submit();
    }
  }
</script>
@endsection