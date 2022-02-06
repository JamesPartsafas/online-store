@extends('layouts.layout')

@section('content')
    <div class = "text-center">
        <form action = "{{ route('login') }}" method = "post" style="max-width:480px;margin:auto;">
            @csrf

            <img src="{{ asset('assets/amaznot.ico') }}" alt="logo">

            <h1 class="h3 mb-3 font-weight-normal">
                Login
            </h1>

            <div class = "mb-4">
                <label for = "name" class = "sr-only">Name</label>
                <input type = "text" name = "name" id = "name"  placeholder = "Name"
                class = "form-control @error('name') border-danger @enderror" value ="">
            </div>

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class = "mb-4">
                <label for = "password" class = "sr-only">Password</label>
                <input type = "password" name = "password" id = "password"  placeholder = "Password"
                class = "form-control @error('name') border-danger @enderror" value ="">
            </div>

            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button type = "submit" class = "btn btn-lg btn-primary btn-block">Login</button>
            </div>

            </form> <br/>
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>

    </div>


@endsection