@extends('layouts.layout')

@section('content')
    <div class = "flex justify-center">
        <div class = "w-4/12 bg white p-6 rounded-lg">
            <form action = "{{ route('register')}}" method = "post">
                @csrf

                <div class = "mb-4">
                    <label for = "name" class = "sr-only">Name</label>
                    <input type = "text" name = "name" id = "name"  placeholder = "Your Name"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('name') }}">

                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "password" class = "sr-only">Password</label>
                    <input type = "password" name = "password" id = "password"  placeholder = "Enter your Password"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="">

                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "password_confirmation" class = "sr-only">Confirm Password</label>
                    <input type = "password" name = "password_confirmation" id = "password_confirmation"  placeholder = "Confirm your Password"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="">

                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <button type = "submit" class = "bg-blue-500 txt-white px-4 py-3 rounded
                    font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>


@endsection