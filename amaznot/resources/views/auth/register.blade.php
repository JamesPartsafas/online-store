@extends('layouts.layout')

@section('content')
    <div class = "text-center">
        <form action = "{{ route('register')}}" method = "post" style="max-width:480px;margin:auto;">
            <img src="{{ asset('assets/amaznot.ico') }}" alt="logo">

            <h1 class="h3 mb-3 font-weight-normal">
                Register
            </h1>

            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder = "Name"
                class="form-control" value="">
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder = "Email"
                class="form-control" value="">
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Email</label>
                <input type="password" name="password" id="password" placeholder = "Password"
                class="form-control" value="">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder = "Confirm Password"
                class="form-control" value="">
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
            </div>
        </form><br/>
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
@endsection