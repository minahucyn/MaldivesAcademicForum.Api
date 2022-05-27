@extends('layouts.admin')
@section('title','Create Topic')
@section('content')

<div class="container p-4">
  <h1>Create Topic</h1>
  <form class="form" action="/admin/topics/store" method="post">
    @csrf
    <div class="row">
      <div class="form-group col-md-4">
        <label for="SpeakerId">Speaker</label>
        <select name="SpeakerId" id="SpeakerId" class="form-select mt-2" aria-label="Speaker Id" value="{{ old('SpeakerId') }}" required>
          @foreach($speakers as $speaker)
          <option value="{{$speaker->Id}}">{{ $speaker->Fullname }}</option>
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('SpeakerId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="ConferenceId">Conference</label>
        <select name="ConferenceId" id="ConferenceId" class="form-select mt-2" aria-label="Conference Id" value="{{ old('ConferenceId') }}" required>
          @foreach($conferences as $conference)
          <option value="{{$conference->Id}}">{{ $conference->Description }}</option>
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('ConferenceId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="Location">Location</label>
        <input name="Location" type="text" class="form-control mt-2" placeholder="Location" required />
        <span class="text-danger">{{ $errors->first('Location') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-4">
        <label for="StartDate">Start Date</label>
        <input name="StartDate" type="date" class="form-control mt-2" required />
        <span class="text-danger">{{ $errors->first('StartDate') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="EndDate">End Date</label>
        <input name="EndDate" type="date" class="form-control mt-2" required />
        <span class="text-danger">{{ $errors->first('EndDate') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-12">
        <label for="Description">Description</label>
        <textarea name="Description" id="Description" class="form-control" rows="5" maxlength="1000" required></textarea>
        <span class="text-danger">{{ $errors->first('Description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/users" class="btn btn-secondary">
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

    $("#topics").addClass("active")
    $("#topics").attr('aria-current', 'page')

  });
</script>
@endsection