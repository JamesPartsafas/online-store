@extends('layouts.layout')

@section('content')
<!-- CAROUSEL -->
<div class="container">
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselIndicators" data-slide-to="1"></li>
      <li data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{url('/assets/cover1.png')}}">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{url('/assets/cover2.png')}}">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{url('/assets/cover3.png')}}">
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
<div class="container">
@foreach($products->chunk(3) as $chunk)
   <div class="row container justify-content-center">
       @foreach($chunk as $product)
        <div class="col-md-4 text-center">
          <a href="{{  $product['id']  }}">
          <img src=" {{ $product['image'] }}" style="max-height:300px; max-width:300px"><br/>
          {{ $product['name'] }}<br/>
          ${{ $product['price'] }}
          </a>  
        </div>
       @endforeach
   </div>
@endforeach
</div>
<!-- END FEATURED ITEMS -->

<!-- PORTFOLIO GALLERY GRID -- TO DO LATER -->
<!--
<div class="container">
<h1 class="text-center" style="font-weight: bold;">BEST SELLERS</h1>
<div class="d-flex justify-content-center">
    <button class="btn-bestsellers" onclick="filterSelection('clothing')"> Clothing, Shoes & Jewelry</button>  
    <button class="btn-bestsellers" onclick="filterSelection('baby')"> Baby Products</button>
    <button class="btn-bestsellers" onclick="filterSelection('home')"> Home & Kitchen</button>
    <button class="btn-bestsellers" onclick="filterSelection('toys')"> Toys & Games</button>
</div>

<div class="column-bestsellers clothing">
    <div class="content-bestsellers">
    <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers clothing">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers clothing">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>

  <div class="row-bestsellers">
  <div class="column-bestsellers baby">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers baby">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers baby">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>

  <div class="column-bestsellers home">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers home">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers home">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
</div>

<div class="column-bestsellers toys">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers toys">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers toys">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>

</div>
-->
<!-- END BEST SELLERS -->


<!-- PROMO IMAGE -->
<div class="container">
  <img class="d-block w-100" src="{{url('/assets/promo.png')}}">
</div> 
<!-- END PROMO IMAGE -->

<div class="row container-fluid" style="padding-left: 10%; padding-right: 10%; padding-top: 1%; padding-bottom:2%">
    <div class="col-sm-4 text-center">
        <i class="fas fa-shipping-fast"></i>
        <h3>FREE SHIPPING</h3>
        <p>No shipping and handling fees for Canada <br/> and the continental United States.</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-hand-holding-usd"></i>
        <h3>100% REFUND</h3>
        <p>Don't like your item? Send us a message and we'll refund you the entire amount, no questions asked!</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-headset"></i>
        <h3>24/7 SUPPORT</h3>
        <p>Got any questions? Send us a message and our 24/7 customer support group will reply to you right away.</p>
    </div>
</div>

<!-- TO DO LATER - WILL INCORPORATE MORE IMAGES
<h1 class="text-center" style="font-weight: bold;">SHOP POPULAR CATEGORIES</h1>
<div class="container">
popular categories go here
</div>
-->

@endsection