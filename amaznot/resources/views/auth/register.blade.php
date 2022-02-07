@extends('layouts.layout')

@section('content')
    <div class = "text-center">
        <form action = "{{ route('register')}}" method = "post" style="max-width:480px;margin:auto;">
            @csrf

            <img src="{{ asset('assets/amaznot.ico') }}" alt="logo">

            <h1 class="h3 mb-3 font-weight-normal">
                Register
            </h1>

            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder = "Name"
                class="form-control @error('name') border-danger @enderror" value="">
            </div>

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-4">
                <label for="password" class="sr-only">Email</label>
                <input type="password" name="password" id="password" placeholder = "Password"
                class="form-control @error('password') border-danger @enderror" value="">
            </div>

            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder = "Confirm Password"
                class="form-control @error('password_confirmation') border-danger @enderror" value="">
            </div>

            @error('password_confirmation')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
            </div>
        </form><br/>
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
@endsection