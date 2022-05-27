@extends('layouts.admin')
@section('title','Update Attendee')
@section('content')

<div class="container p-4">
  <h1>Update attendee</h1>
  <form class="form" action="/admin/attendees/update/{{ $attendee->Id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row mt-5">
      <div class="form-group col-md-4">
        <label for="Fullname">Full name</label>
        <input name="Fullname" type="text" class="form-control mt-2" placeholder="Full name" value="{{ $attendee->Fullname }}" required />
        <span class="text-danger">{{ $errors->first('Fullname') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="NidPp">NID / PP</label>
        <input name="NidPp" type="text" class="form-control mt-2" placeholder="NID / PP" value="{{ $attendee->NidPp }}" required />
        <span class="text-danger">{{ $errors->first('NidPp') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="Birthdate">Birthdate</label>
        <input name="Birthdate" type="date" class="form-control mt-2" value="{{ date('Y-m-d',strtotime($attendee->Birthdate)) }}" required />
        <span class="text-danger">{{ $errors->first('Birthdate') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-4">
        <label for="ContactNumber">Contact number</label>
        <input name="ContactNumber" type="text" class="form-control mt-2" placeholder="Contact number" value="{{ $attendee->ContactNumber }}" required />
        <span class="text-danger">{{ $errors->first('ContactNumber') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="Email">Email</label>
        <input name="Email" type="email" class="form-control mt-2" placeholder="Email" value="{{ $attendee->Email }}" required />
        <span class="text-danger">{{ $errors->first('Email') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="EducationId">Education Level</label>
        <select name="EducationId" id="EducationId" class="form-select mt-2" aria-label="Education Id" value="{{ $attendee->EducationId }}" required>
          @foreach($levels as $level)
          @if ($level->Id === $attendee->EducationId)
          <option value="{{$level->Id}}" selected>{{ $level->Description }}</option>
          @else
          <option value="{{$level->Id}}">{{ $level->Description }}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('EducationId') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/attendees" class="btn btn-secondary">
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

    $("#attendees").addClass("active")
    $("#attendees").attr('aria-current', 'page')

  });
</script>
@endsection