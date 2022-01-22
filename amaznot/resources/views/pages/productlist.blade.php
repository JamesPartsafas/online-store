@extends('layouts.layout')

@section('content')

    <p>Welcome to a product list page</p>
    <p>If you can see the following data, you have configured your local DB correctly:</p>
    {{ $product }}

@endsection