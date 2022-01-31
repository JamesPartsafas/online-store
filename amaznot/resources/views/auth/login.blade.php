@extends('layouts.layout')

@section('content')
    <div class = "flex justify-center">
        <div class = "w-4/12 bg-white p-6 rounded-lg">
            <form action = "{{ route('login') }}" method = "post">
                @csrf

                <div class = "mb-4">
                    <label for = "name" class = "sr-only">Name</label>
                    <input type = "text" name = "name" id = "name"  placeholder = "Your Name"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="">
                </div>

                <div class = "mb-4">
                    <label for = "password" class = "sr-only">Password</label>
                    <input type = "text" name = "password" id = "password"  placeholder = "Enter your Password"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="">
                </div>

                <div>
                    <button type = "submit" class = "bg-blue-500 txt-white px-4 py-3 rounded
                    font-medium w-full">Login</button>
                </div>

            </form>
        </div>
    </div>


@endsection