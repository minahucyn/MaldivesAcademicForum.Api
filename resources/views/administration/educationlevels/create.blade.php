@extends('layouts.admin')
@section('title','Create education level')
@section('content')

<div class="container p-4">
  <h1>Create education level</h1>
  <form class="form" action="{{ route('educationlevels.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="form-group col-md-4">
        <label for="Description">Description</label>
        <input name="Description" type="text" class="form-control" placeholder="Description" required />
        <span class="text-danger">{{ $errors->first('description') }}</span>
      </div>
    </div>
    <div class="form-group row mt-xl-5 text-center">
      <div class="col-sm-12 mb-3 mb-sm-0">
        <a href="{{ route('educationlevels.index') }}" class="btn btn-secondary">
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