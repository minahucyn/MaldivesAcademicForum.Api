@extends('layouts.admin')
@section('title','Create User')
@section('content')

<div class="container p-4">
  <h1>Create User</h1>
  <form class="form" action="/admin/users/store" method="post">
    @csrf
    <div class="row">
      <div class="form-group col-md-6">
        <label for="name">Full name</label>
        <input name="name" type="text" class="form-control mt-2" placeholder="Full name" value="{{ old('name') }}" required />
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control mt-2" placeholder="Email" required />
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>

    </div>
    <div class="row mt-4">
      <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control mt-2" placeholder="Password" required />
        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="password_confirmation">Password Confirmation:</label>
        <input type="password" class="form-control mt-2" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
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

    $("#users").addClass("active")
    $("#users").attr('aria-current', 'page')

  });
</script>
@endsection