@extends('layouts.admin')
@section('title','Update Registration')
@section('content')

<div class="container p-4">
  <h1>Update Registration</h1>
  <form class="form mt-5" action="/admin/registrations/update/{{ $registration->Id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-4">
        <label for="AttendeeId">Attendee</label>
        <select name="AttendeeId" id="AttendeeId" class="form-select mt-2" aria-label="Attendee Id" value="{{ $registration->AttendeeId }}" required>
          @foreach($attendees as $attendee)
          @if($registration->AttendeeId === $attendee->Id)
          <option value="{{$attendee->Id}}" selected>{{ $attendee->Fullname }}</option>
          @else
          <option value="{{$attendee->Id}}">{{ $attendee->Fullname }}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('AttendeeId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="ConferenceId">Conference</label>
        <select name="ConferenceId" id="ConferenceId" class="form-select mt-2" aria-label="Conference Id" value="{{ $registration->ConferenceId }}" required>
          @foreach($conferences as $conference)
          @if($registration->ConferenceId === $conference->Id)
          <option value="{{$conference->Id}}" selected>{{ $conference->Description }}</option>
          @else
          <option value="{{$conference->Id}}">{{ $conference->Description }}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('ConferenceId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="PaymentSlipPath" class="form-label">Payment Slip</label>
        <input class="form-control" type="file" id="PaymentSlipPath" name="PaymentSlipPath" accept="image/png, image/jpg">
        <span class="text-danger">{{ $errors->first('PaymentSlipPath') }}</span>
      </div>
    </div>
    <div class="row mt-3">
      <div class="form-group col-md-4">
        <label for="IsApproved">Approval Status</label>
        <select name="IsApproved" id="IsApproved" aria-label="Approval Status" class="form-select mt-2">
          <option value="-1" {{ $registration->IsApproved === -1 ? 'selected' : '' }}>Rejected</option>
          <option value="0" {{ $registration->IsApproved === 0 ? 'selected' : '' }}>pending</option>
          <option value="1" {{ $registration->IsApproved === 1 ? 'selected' : '' }}>Approved</option>
        </select>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/registrations" class="btn btn-secondary">
          Back
        </a>
        <button class="btn btn-primary" type="submit"> Submit</button>
      </div>
    </div>
  </form>
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