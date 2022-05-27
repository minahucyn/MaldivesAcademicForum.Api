@extends('layouts.auth')
@section('title','Login')
@section('content')

<form method="POST" action="/login">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
    <span class="text-danger">{{ $errors->first('message') }}</span>
  </div>

  <div class="form-group">
    <a href="/" class="btn btn-secondary">Back</a>
    <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
  </div>
</form>

@endsection


@section('scripts')
<script>
</script>
@endsection