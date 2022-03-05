@extends('layouts.layout')

@section('content')
<!-- CAROUSEL -->
<div class="container mt-5 mb-3">
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselIndicators" data-slide-to="1"></li>
      <li data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{ route('productpage', ['category' => 'Home and Kitchen', 'id' => '1140']) }}">
        <img class="d-block w-100" src="{{url('/assets/cover1.png')}}">
        </a>
      </div>
      <div class="carousel-item">
        <a href="{{ route('productlist', ['category' => 'Pet Supplies']) }}">
        <img class="d-block w-100" src="{{url('/assets/cover2.png')}}">
        </a>
      </div>
      <div class="carousel-item">
        <a href="{{ route('productlist', ['category' => 'Sports and Outdoors']) }}">
        <img class="d-block w-100" src="{{url('/assets/cover3.png')}}">
        </a>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- END CAROUSEL -->

<!-- FEATURED ITEMS -->
<h1 class="text-center" style="font-weight: bold;">FEATURED ITEMS</h1>
<div class="container align-middle mt-3 mb-3">
@foreach($products->chunk(3) as $chunk)
   <div class="row container justify-content-center">
      @foreach($chunk as $product)
        <div class="col-md-4 text-center my-auto">
          <a href="{{ route('productpage', ['category' => $product['category'], 'id' => $product['id']]) }}">
            <img src=" {{ $product['image'] }}" style="max-height:300px; max-width:300px"><br/>
          </a>
        </div>
      @endforeach
      @foreach($chunk as $product)
        <div class="col-md-4 text-center my-auto">
          <a href="{{ route('productpage', ['category' => $product['category'], 'id' => $product['id']]) }}">
            {!! Str::limit($product['name'], 100) !!} <br />
            <i class="fas fa-star rating"></i><i class="fas fa-star rating"></i><i class="fas fa-star rating"></i><i class="fas fa-star rating"></i><i class="far fa-star"></i><br />
            ${{ $product['price'] }}
          </a>  
        </div>
       @endforeach
   </div>
@endforeach
</div>
<!-- END FEATURED ITEMS -->

<!-- PROMO IMAGE -->
<div class="container mt-5 mb-5">
  <a href="{{ route('productlist', ['category' => 'Toys and Games']) }}">
    <img class="d-block w-100" src="{{url('/assets/promo.png')}}">
  </a>
</div> 
<!-- END PROMO IMAGE -->

<div class="row container-fluid" style="padding-left: 10%; padding-right: 10%; padding-top: 1%; padding-bottom:2%">
    <div class="col-sm-4 text-center">
        <i class="fas fa-shipping-fast symbols"></i>
        <h3 class="my-2">FREE SHIPPING</h3>
        <p>No shipping and handling fees for Canada <br/> and the continental United States.</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-hand-holding-usd symbols"></i>
        <h3 class="my-2">100% REFUND</h3>
        <p>Don't like your item? Send us a message and we'll refund you the entire amount, no questions asked!</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-headset symbols"></i>
        <h3 class="my-2">24/7 SUPPORT</h3>
        <p>Got any questions? Send us a message and our 24/7 customer support group will reply to you right away.</p>
    </div>
</div>

@endsection