@extends('layouts.admin')
@section('title','Create Speaker')
@section('content')

<div class="container p-4">
  <h1>Create speaker</h1>
  <form class="form" action="/admin/speakers/store" method="post">
    @csrf
    <div class="row">
      <div class="form-group col-md-6">
        <label for="Fullname">Full name</label>
        <input name="Fullname" type="text" class="form-control" placeholder="Full name" required />
        <span class="text-danger">{{ $errors->first('Fullname') }}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="Designation">Designation</label>
        <input name="Designation" type="text" class="form-control" placeholder="Designation" required />
        <span class="text-danger">{{ $errors->first('Designation') }}</span>
      </div>
    </div>
    <div class="row mt-2">
      <div class="form-group col-md-12">
        <label for="Description">Description</label>
        <textarea name="Description" id="Description" class="form-control" rows="5" maxlength="1000" required></textarea>
        <span class="text-danger">{{ $errors->first('Description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/speakers" class="btn btn-secondary">
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

    $("#speakers").addClass("active")
    $("#speakers").attr('aria-current', 'page')

  });
</script>
@endsection