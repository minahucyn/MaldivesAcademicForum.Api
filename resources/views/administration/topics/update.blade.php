@extends('layouts.admin')
@section('title','Update Topic')
@section('content')

<div class="container p-4">
  <h1>Update Topic</h1>
  <form class="form" action="/admin/topics/update/{{ $topic->Id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-4">
        <label for="SpeakerId">Speaker</label>
        <select name="SpeakerId" id="SpeakerId" class="form-select mt-2" aria-label="Speaker Id" value="{{ $topic->SpeakerId }}" required>
          @foreach($speakers as $speaker)
          @if($speaker->Id == $topic->SpeakerId)
          <option value="{{$speaker->Id}}" selected>{{ $speaker->Fullname }}</option>
          @else
          <option value="{{$speaker->Id}}">{{ $speaker->Fullname }}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('SpeakerId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="ConferenceId">Conference</label>
        <select name="ConferenceId" id="ConferenceId" class="form-select mt-2" aria-label="Conference Id" value="{{ $topic->ConferenceId }}" required>
          @foreach($conferences as $conference)
          @if($conference->Id == $topic->ConferenceId)
          <option value="{{$conference->Id}}" selected>{{ $conference->Description }}</option>
          @else
          <option value="{{$conference->Id}}">{{ $conference->Description }}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('ConferenceId') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="Location">Location</label>
        <input name="Location" type="text" class="form-control mt-2" placeholder="Location" value="{{ $topic->Location }}" required />
        <span class="text-danger">{{ $errors->first('Location') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-4">
        <label for="StartDate">Start Date</label>
        <input name="StartDate" type="date" class="form-control mt-2" value="{{ date('Y-m-d',strtotime($topic->StartDate)) }}" required />
        <span class="text-danger">{{ $errors->first('StartDate') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="EndDate">End Date</label>
        <input name="EndDate" type="date" class="form-control mt-2" value="{{ date('Y-m-d',strtotime($topic->EndDate)) }}" required />
        <span class="text-danger">{{ $errors->first('EndDate') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-12">
        <label for="Description">Description</label>
        <textarea name="Description" id="Description" class="form-control" rows="5" maxlength="1000" required>{{ $topic->Description }}</textarea>
        <span class="text-danger">{{ $errors->first('Description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/topics" class="btn btn-secondary">
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