@extends('layouts.main')

@section('container')
<form class="mx-auto" style="width: 30%">
    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" placeholder="name" required>
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <small>Already have an account? <a href="/login">Sign in</a></small>
</form>
@endsection