@extends('layouts.layout')

@section('content')



<!--convert to carousel/slideshow maybe?-->
<div class="hero-image">
    <div class="hero-text">
        <p>Meet the all new</p>
        <h1>reverb</h1>
        <p>"Alexo, play some Justin Bieber!"</p>
    </div>
</div> 

<h1 class="text-center" style="font-weight: bold;">BEST SELLERS</h1>
<div id="myBtnContainer">
    <button class="btn-bestsellers" onclick="filterSelection('clothing')"> Clothing</button>  
    <button class="btn-bestsellers" onclick="filterSelection('electronics')"> Electronics</button>
    <button class="btn-bestsellers" onclick="filterSelection('home')"> Home</button>
    <button class="btn-bestsellers" onclick="filterSelection('toys')"> Toys</button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row-bestsellers">
  <div class="column-bestsellers electronics">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers electronics">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
  <div class="column-bestsellers electronics">
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
  <div class="column-bestsellers clothing">
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
  <div class="column-bestsellers home">
    <div class="content-bestsellers">
      <img src="" alt="" style="width:100%">
      <h4>Title</h4>
      <p>Description</p>
    </div>
  </div>
<!-- END BEST SELLERS -->
</div> 


<div class="promo-image">
    <div class="promo-text">
        <h1>Easter Specials</h1>
        <p>Cute and colorful designs for the Lenten season.</p>
        <p><a href="">Shop now.</a></p>
    </div>
</div> 

<h1 class="text-center" style="font-weight: bold;">FEATURED ITEMS</h1>
    <!--Add single row of featured items-->

<div class="row container-fluid" style="padding-left: 10%; padding-right: 10%; padding-top: 1%; padding-bottom:2%">
    <div class="col-sm-4 text-center">
        <i class="fas fa-shipping-fast"></i>
        <h3>FREE SHIPPING</h3>
        <p>No shipping and handling fees for Canada and the continental United States.</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-hand-holding-usd"></i>
        <h3>100% REFUND</h3>
        <p>Don't like your item? Send us a message and we'll refund you the entire amount, no questions asked!</p>
    </div>
    <div class="col-sm-4 text-center">
        <i class="fas fa-headset"></i>
        <h3>24/7 SUPPORT</h3>
        <p>Got any questions? Send us a message and our 24/7 customer support group will get back to you right away..</p>
    </div>
</div>

<h1 class="text-center" style="font-weight: bold;">SHOP POPULAR CATEGORIES</h1>
    <!--Add single row of featured categories-->


<!--
    <p>Product pages:</p>

    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('productlist', ['category' => $category['category'] ]) }}">{{ $category['category'] }}</a>
            </li>
        @endforeach
    </ul>
-->

@endsection