@extends('layouts.dashboard')
@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="d-flex col-1 navbar-dark bg-dark h-100 justify-content-center">
            <ul class="navbar-nav">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Dashbard</a>
                <li class="nav-item">
                    <a href="#" class="nav-link">Post</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col">
        </div>
    </div>
</div>
@endsection