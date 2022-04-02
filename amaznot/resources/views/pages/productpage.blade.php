

@extends('layouts.layout')

@section('content')
  {{-- displays the information of price,weight,name of the item --}}
    <div class="box-wrapper row mt-5" style="margin-left:3%;width:calc(100% - 3%);margin-top:relative;">
      <div class="row">
        <div class="col" > 
          <img src=" {{ $product['image'] }}"  class="img-fluid" alt="product image" title="product image" style = "object-fit:scale-down;width:350px;height:350px;border: 4px solid #F5F5F5;">
        </div>
      </div>
      <div class="col" style="margin-left:2%;margin-top:relative;">
        <div class="card text-dark bg-light" style="max-width: 38rem;max-height:18rem;padding:1px;border: 4px solid #F5F5F5;">
          <div class="card-body" > 
            <div class="alert alert-light" role="alert" style="border: solid #FBF8F1;" >
              <strong> 
                <h4>
                  {{ str_replace('|', ' ', $product['name']) }}
                </h4>
              </strong>
            </div>
            <div style= "margin-left:3.5%;">
              <?php echo "Price:"; ?> {{  $product['price'] }} <?php echo "$"; ?>
              <?php echo nl2br("\n"); ?> 
              @if ($product['weight'] == null)    
              @else   <?php echo "Weight: "; ?> {{ $product['weight'] }} 
              @endif
              <?php echo nl2br("\n"); ?> <?php echo nl2br("\n"); ?> 
            </div>
            @if (!$userCanAddToCart) {{ $userCanAddToCart }}
              <div class="alert alert-warning" role="alert">
                Please login to add items to your cart
              </div>
            @else
              <form  method='post'>
                <div style= "margin-left:3.5%;">
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <div id='add-controls'>
                      <button type='button' class="btn btn-info" style="border-radius:17px;"onclick="decrement({{ $product['id'] }})">
                        <i class="fas fa-minus-square"></i>
                      </button>
                      <input type='text'  id="{{ $product['id'] }}" value="1"  size='1' style="text-align:center;border-radius: 1px;radius:1px;border:  white;" disabled >
                      <button class="btn btn-info" style="margin-right:14px;border-radius:17px;" type='button' class="btn btn-primary" onclick="increment({{ $product['id'] }})" >
                        <i class="fas fa-plus-square"></i>
                      </button>
                      <button type="button" class="btn btn-info"  style="border-radius:17px;" onclick="addToCart({{ $product['id'] }}, productName, price, image, renderScreen)">
                        <i class="fas fa-regular fa-cart-plus"></i> &nbsp; Add to Cart
                      </button>
                    </div>
                    <div id='remove-controls'>
                      <button  style="border-radius:17px;" class="btn btn-info" type="button" onclick="removeFromCart({{ $product['id'] }}, renderScreen)" >
                        <i class="fas fa-cart-arrow-down"></i> &nbsp; Remove from Cart
                      </button>
                    </div>
                  </div>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>   
  {{-- displays the information of item with full details --}}
    <div class="box-wrapper row mt-5" style="margin-left:3%;margin-top:relative;margin-bottom:25px;width:calc(100% - 3%);">
      <div class="card text-dark bg-light" style="width:62.5rem;border: 4px solid #F5F5F5;" >
        <div class="card-body">
      
          <div id="myBtnContainer" >
            <button class="btn-bestsellers" style="border:0.5px solid darkcyan;" onclick="filterSelection('Description')"> Description</button>  
            <button class="btn-bestsellers"  style="border:  0.5px solid darkcyan;" onclick="filterSelection('Details')"> Details</button>
          </div>

          <div class="row-bestsellers"> 
            <div class="column-bestsellers Description">
              <div class="content-bestsellers" style="padding:2px;width:900px;margin-left:-5%;background-color:#fafafa;">
                <p class="card-text" style="background-color:#fafafa;margin-left:2%;margin-right:2%;"> 
                  <?php echo nl2br("\n");  ?>{{ str_replace('|', ' ', $product['about']);  }}
                </p>
              </div>
            </div>
            <div class="column-bestsellers Details">
              <div class="content-bestsellers" style="padding:2px;width:900px;margin-left:-5%;background-color:#fafafa;">
                <p class="card-text" style="background-color:#fafafa;margin-left:2%;margin-right:2%;"> 
                  <?php echo nl2br("\n"); ?>
                  {{ str_replace('|', ' ', $product['details']); }}
                  <?php echo nl2br("\n"); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  {{-- functions related to adding or showing the buttons of increase/decrease item quantity with addition or removal from cart --}}
    <script>
      const renderScreen = (id) => {
        const cart = JSON.parse(localStorage.getItem('cart'))

        if (cart == null || !cart.find(element => element.id == id))
          showAddControls()
        else
          showRemoveControls()
      };

      const showAddControls = () => {
        document.getElementById('add-controls').style.display = "block"
        document.getElementById('remove-controls').style.display = "none"
      };

      const showRemoveControls = () => {
        document.getElementById('add-controls').style.display = "none"
        document.getElementById('remove-controls').style.display = "block"
      };

      const productName = {!! json_encode($product['name']) !!}
      const price = {!! json_encode($product['price']) !!}
      const image = {!! json_encode($product['image']) !!}
      
      renderScreen({!! json_encode($product['id']) !!});
    </script>

@endsection

