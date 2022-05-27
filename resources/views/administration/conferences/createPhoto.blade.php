@extends('layouts.admin')
@section('title','Add Photos')
@section('content')

<div class="container p-4">
  <h1>Add Photos to Conference</h1>
  <form class="form" action="/admin/conferences/photos/store/{{ $conferenceId }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="form-group col-md-4">
        <label for="Photos">Photos</label>
        <input type="file" name="Photos[]" class="form-control" accept="image/png, image/jpeg, image/jpg" multiple>
        <span class="text-danger">{{ $errors->first('Photos') }}</span>
      </div>

    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/conferences/gallery/{{ $conferenceId }}" class="btn btn-secondary">
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