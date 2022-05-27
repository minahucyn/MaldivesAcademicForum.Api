@extends('layouts.admin')
@section('title','Update education level')
@section('content')

<div class="container p-4">
  <h1>Update education level</h1>
  <form class="form" action="/admin/education-levels/update/{{ $level->Id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-4">
        <label for="Description">Description</label>
        <input name="Description" type="text" class="form-control" placeholder="Description" value="{{ $level->Description }}" required />
        <span class="text-danger">{{ $errors->first('Description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="/admin/education-levels" class="btn btn-secondary">
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

    $("#education-levels").addClass("active")
    $("#education-levels").attr('aria-current', 'page')

  });
</script>
@endsection