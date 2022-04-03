@extends('layouts.layout')

@section('content')


    <section id="subcategory" class="subcategory">

        <div class="container">

            <div class="section-title section-bg">
                <h2>Search results for: {{$query}} </h2>
            </div>

            <div class="box-wrapper row mt-5">
                @foreach($products as $product)
                    <div class="col-md-4 icon-box" aria-hidden="true" tabindex="0">
                        <div class="box-item">
                            <a href="{{ route('productpage', ['category' => $product['category'], 'id' => $product['id']]) }}">
                                <br>
                                <img src="{{ $product['image'] }}" class="img-fluid" style="object-fit: scale-down; width: 200px; height: 300px;">
                                    <p>$ {{ $product['price'] }}</p>
                                    <h4 class="title" style="font-size: 15px;">{{ $product['name'] }}</h4> 
                            </a>
                        </div>  
                    </div>
                @endforeach

            </div>

            

        </div>

    </section>
    
@endsection