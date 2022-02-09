

@extends('layouts.layout')

@section('content')

    {{-- {{ $product }} --}}
  
    <script>
        function modify(target,state)
            {
              
                if (state==true) {
                    ++target.previousElementSibling.value;
                 const myJSON = JSON.stringify(target.previousElementSibling.value);
                 window.localStorage.setItem("$product['id']",myJSON);
                 window.localStorage.getItem("$product['id']");
                
                }
                if (state==false) {
                    if (target.nextElementSibling.value<=1) {
                        target.nextElementSibling.value = 1;
                      const myJSON = JSON.stringify(target.nextElementSibling.value);
                       window.localStorage.setItem("$product['id']",myJSON);
                      window.localStorage.getItem("$product['id']");

                    }
                    else {
                        --target.nextElementSibling.value;
                      const myJSON = JSON.stringify(target.nextElementSibling.value);
                       window.localStorage.setItem("$product['id']",myJSON);
                       window.localStorage.getItem("$product['id']");

                    }
                }

            }
//function display()
  // {
   //document.getElementById("result").innerHtml =  window.localStorage.getItem("q");

 // }
  //window.onload= display();  
    </script>
  
   <div class="box-wrapper row mt-5" style="margin-left:3%;margin-top:relative;">
  <div class="row">
   <div class="col" > 
 
  <img src=" {{ $product['image'] }}"  class="img-fluid" alt="product image" title="product image" style = "object-fit:scale-down;width:350px;height:350px;">
    </div>
        </div>
 
  <div class="col" style="margin-left:2%;margin-top:relative;">
<div class="card text-dark bg-light " style="max-width: 38rem;max-height:18rem;">
  <div class="card-body" >
     <strong>{{ $product['name'] }}</strong>  <?php echo nl2br("\n"); ?>
    <?php echo "Price:"; ?> {{  $product['price'] }} <?php echo "$"; ?>
     <?php echo nl2br("\n"); ?>   <?php echo "Weight:"; ?>{{ $product['weight'] }}
     <form  method='post'>
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
<button type='button'  style="border-radius: 4px;"class="btn btn-primary" onclick='modify(this,false)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
  </button>
 
<input type='text'  id="result" value="1"  size='1' style="text-align:center;border-radius: 4px;" disabled >
<button style="margin-right:14px;border-radius: 4px;" type='button' class="btn btn-primary" onclick='modify(this,true)' ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
  </button>
<button  style="border-radius: 4px;" class="btn btn-primary" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 3 14 14">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/></svg>
    Add to Cart</button>
  </div>
</form>

</div>

</div>
</div>
</div>






   
 <div class="box-wrapper row mt-5" style="margin-left:3%;margin-top:relative;">
      <div class="card text-dark bg-light " style="width:62.5rem;" >
  <div class="card-body">
  <div id="myBtnContainer">
    <button class="btn-bestsellers" onclick="filterSelection('Description')"> Description</button>  
    <button class="btn-bestsellers" onclick="filterSelection('Details')"> Details</button>
</div>
    
<div class="row-bestsellers"> 
<div class="column-bestsellers Description">
    <div class="content-bestsellers" style="width:700px;margin-left:-5%;">
     
     <p class="card-text"> <?php echo nl2br("\n");  ?>{{$product['about'] }}</p>
    </div>
  </div>
  <div class="column-bestsellers Details">
    <div class="content-bestsellers" style="width:700px;margin-left:-5%;">
      
      <p class="card-text"> 

     <?php
   echo nl2br("\n"); 
          ?>
    {{ $product['details'] }}
     <?php
   echo nl2br("\n"); 
  ?>
  </p>
    </div>
  </div>
  </div>
</div>
 </div> 
   











  

  
    
    
    



    {{-- <ul>
        @foreach($products as $product)
            <li>{{ $product['image'] }}</li>
        @endforeach
    </ul> --}} 
 

@endsection

