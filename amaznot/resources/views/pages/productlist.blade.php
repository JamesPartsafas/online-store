@extends('layouts.layout')

@section('content')

   
<section id="subcategory" class="subcategory">

    <div class="container">

        <div class="section-title section-bg">
            <h2>Sub-categories</h2>
        </div>

        <div class="box-wrapper row mt-5">
            @foreach($subcategories as $subcategory)
                <div class="col-md-2 icon-box" aria-hidden="true" tabindex="0">
                    <div class="box-item">
                        <?php 
                        $category="";
                        $category=$products[0]['category'];
                        ?>
                        <a href=" {{ route('productsubcatlist', ['category' => $category, 'subcategory' => $subcategory['subcategory']]) }}">
                            <h4 class="title"> {{ $subcategory['subcategory'] }} </h4> 
                        </a>
                    </div>  
                </div>
            @endforeach
  
        </div>

   

        <br>
        <div class="section-title section-bg">
            <h2>Products</h2>
        </div>

        <div class="box-wrapper row mt-5">
            @foreach($products as $product)
                <div class="col-md-4 icon-box" aria-hidden="true" tabindex="0">
                    <div class="box-item">
                        <a href="{{ route('productpage', ['category' => $category, 'id' => $product['id']]) }}">
                            <br>
                            <img src="{{ $product['image'] }}" class="img-fluid" style="object-fit: scale-down; width: 200px; height: 300px;">
                                <p>$ {{ $product['price'] }}</p>
                                <h4 class="title" style="font-size: 15px;">{{ $product['name'] }}</h4> 
                        </a>
                    </div>  
                </div>
            @endforeach
   
        </div>

        <span>
            {{ $products->withQueryString()->links() }}
        </span>

    </section>
    
@endsection