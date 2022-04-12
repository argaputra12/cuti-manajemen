@extends('layouts.main')

@section('container')
<form class="mx-auto" style="width: 30%">
    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required autofocus>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <small>Not registered? <a href="/register">Register Now</a></small>
</form>
@endsection