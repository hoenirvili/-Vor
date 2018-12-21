@extends('layouts.base')
@section('content')
<div class="container h-100 d-flex align-items-center justify-content-center flex-column">
    <form role="form" method="post" action="{{ route('login') }}">
        <h2>Login</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" aria-describedby="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input name="rememberme" type="checkbox" class="form-check-input">
            <label class="form-check-label" for="rememberme">Remember me</label>
        </div>
        <button type="submit" class="w-100 btn btn-primary">Login</button>
        @csrf
    </form>
</div>
@endsection