@extends('layouts.admin')
@section('title','Update Sponsor')
@section('content')

<div class="container p-4">
  <h1>Update Sponsor</h1>
  <form class="form" action="/admin/sponsors/update/{{ $sponsor->Id }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="form-group col-md-6">
        <label for="LogoUri">Logo Url</label>
        <input name="LogoUri" type="text" class="form-control" placeholder="Logo Url" value="{{ $sponsor->LogoUri }}" maxlength="200" required />
        <span class="text-danger">{{ $errors->first('LogoUri') }}</span>
      </div>
      <div class="row mt-2">
        <div class="form-group col-md-12">
          <label for="Description">Description</label>
          <textarea name="Description" id="Description" class="form-control" rows="2" maxlength="100" required>{{ $sponsor->Description }}</textarea>
          <span class="text-danger">{{ $errors->first('Description') }}</span>
        </div>
      </div>
      <div class="form-group row mt-xl-5 text-center">
        <div class="col-sm-12 mb-3 mb-sm-0">
          <a href="/admin/sponsors" class="btn btn-secondary">
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

    $("#sponsors").addClass("active")
    $("#sponsors").attr('aria-current', 'page')

  });
</script>
@endsection