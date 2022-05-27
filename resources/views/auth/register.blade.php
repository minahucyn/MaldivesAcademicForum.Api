@extends('layouts.auth')
@section('title','Register')
@section('content')

<div class="container p-4">
  <h1>Register</h1>
  <form method="POST" action="/register">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name">
      <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email">
      <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
      <span class="text-danger">{{ $errors->first('password') }}</span>
    </div>

    <div class="form-group">
      <label for="password_confirmation">Password Confirmation:</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    </div>

    <div class="form-group">
      <a href="/" class="btn btn-secondary">Back</a>
      <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection

@section('scripts')
<script>
</script>
@endsection