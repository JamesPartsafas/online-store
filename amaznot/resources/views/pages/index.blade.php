@extends('layouts.layout')

@section('content')

    <p>Welcome to Amaznot!</p>

    <p>Product pages:</p>

    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('productlist', ['category' => $category['category'] ]) }}">{{ $category['category'] }}</a>
            </li>
        @endforeach
    </ul>

@endsection