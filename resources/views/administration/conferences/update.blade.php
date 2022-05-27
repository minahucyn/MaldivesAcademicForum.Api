@extends('layouts.admin')
@section('title','Update Conference')
@section('content')

<div class="container p-4">
  <h1>Update Conference</h1>
  <form class="form" action="/admin/conferences/update/{{ $conference->Id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-4">
        <label for="Venue">Venue</label>
        <input name="Venue" type="text" class="form-control mt-2" placeholder="Venue" maxlength="200" value="{{ $conference->Venue }}" required />
        <span class="text-danger">{{ $errors->first('Venue') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="RegistrationStartDate">Registration start date</label>
        <input type="date" class="form-control mt-2" id="RegistrationStartDate" name="RegistrationStartDate" value="{{ date('Y-m-d',strtotime($conference->RegistrationStartDate)) }}" required>
        <span class="text-danger">{{ $errors->first('RegistrationStartDate') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="RegistrationEndDate">Registration end date</label>
        <input type="date" class="form-control mt-2" id="RegistrationEndDate" name="RegistrationEndDate" value="{{ date('Y-m-d',strtotime($conference->RegistrationEndDate)) }}" required>
        <span class="text-danger">{{ $errors->first('RegistrationEndDate') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-4">
        <label for="StartDate">Start date</label>
        <input type="date" class="form-control mt-2" id="StartDate" name="StartDate" value="{{ date('Y-m-d',strtotime($conference->StartDate)) }}" required>
        <span class="text-danger">{{ $errors->first('StartDate') }}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="EndDate">End date</label>
        <input type="date" class="form-control mt-2" id="EndDate" name="EndDate" value="{{ date('Y-m-d',strtotime($conference->EndDate)) }}" required>
        <span class="text-danger">{{ $errors->first('EndDate') }}</span>
      </div>
    </div>
    <div class="row mt-4">
      <div class="form-group col-md-12">
        <label for="Description">Description</label>
        <textarea name="Description" id="Description" class="form-control mt-2" rows="2" maxlength="100" required>{{ $conference->Description }}</textarea>
        <span class="text-danger">{{ $errors->first('Description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/conferences" class="btn btn-secondary">
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

    $("#conferences").addClass("active")
    $("#conferences").attr('aria-current', 'page')

  });
</script>
@endsection