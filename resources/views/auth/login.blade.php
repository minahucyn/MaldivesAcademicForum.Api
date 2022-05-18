@extends('layouts.auth')
@section('title','Login')
@section('content')

<form action="#" method="post">
  <img class="mb-4" src="{{ asset('images/misc/doge.png') }}" alt="" width="auto" height="70">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <div class="form-floating">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating mt-2">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Sign in</button>
  <a href="/" class="btn-link text-center">Go Back</a>
  <p class="mt-5 mb-3 text-muted">&copy; Maldives Academic Forum {{ now()->year }}</p>
</form>

@endsection


@section('scripts')
<script>
</script>
@endsection