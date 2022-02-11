@extends('layouts.layout')

@section('content')

    <!-- Ensure when user selects a subcategory, they are brought back to page 1
    Also ensure that if subcategory is selected, it is persisted across pages -->
    <!-- <p>Welcome to a product list page</p>
    <p>If you can see the following data, you have configured your local DB correctly:</p>

    <p>The following subcategories are available for this category:</p>
    <ul> -->
<section id="subcategory" class="subcategory">

    <div class="container">

        <div class="section-title section-bg">
            <h2>Sub-categories</h2>
        </div>

        <div class="box-wrapper row mt-5">
            @foreach($subcategories as $subcategory)
                <div class="col-md-4 icon-box" aria-hidden="true" tabindex="0">
                    <div class="box-item">
                        <?php 
                        $category="";
                        $category=$products[0]['category'];
                        ?>
                        <a href=" {{ route('productsubcatlist', ['category' => $category, 'subcategory' => $subcategory['subcategory']]) }}">
                            <h4 class="title" style="color: black;"> {{ $subcategory['subcategory'] }} </h4>  <!--Removed <li></li>-->
                        </a>
                    </div>  
                </div>
            @endforeach
    <!-- </ul> -->
        </div>

    <!-- <p>Items on this page:</p>
    <ul> -->

        <br>
        <div class="section-title section-bg">
            <h2>Products</h2>
        </div>

        <div class="box-wrapper row mt-5">
            @foreach($products as $product)
                <div class="col-md-4 icon-box" aria-hidden="true" tabindex="0">
                    <div class="box-item">
                        <a href="{{ route('productpage', ['category' => $category, 'id' => $product['id']]) }}">
                            <h4 class="title" style="color: black;">{{ $product['name'] }}</h4> 
                            <img src="{{ $product['image'] }}" style="width: 50%; height: 50%">
                        </a>
                    </div>  
                </div>
            @endforeach
    <!-- </ul> -->
        </div>

        <span>
            {{ $products->withQueryString()->links() }}
        </span>

    </section>
    
@endsection