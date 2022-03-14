@extends('layouts.layout')

@section('content')
    
    <div class="cart-items">
        <form action="{{ route('orders') }}" method="post">

            @csrf

            <div id="cart-holder"  class="card text-dark bg-light"style="border: 4px solid #F5F5F5;">
     
            </div>
        
            <div id="price-holder" class="card text-dark bg-light"style="border: 4px solid #F5F5F5;">
                <p id="subtotal"></p>
                <p id="qst"></p>
                <p id="gst"></p>
                <h2 id="total-price"></h2>

            </div>
         
                    </button>
            <label for="credit_card" style="color:red;margin-right:2%;margin-left:1%;" class="alert alert-warning" role="alert">
                WARNING: Input not secure. Do not enter sensitive data
            </label>
            <input type="text" id="credit_card" name="credit_card" style="border:0.5px solid darkcyan;border-radius:17px;" placeholder="Fake Credit Card Number">
            @error('credit_card')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            
            <button type = "submit" class="btn btn-info"  style="border-radius:17px;margin-left:1%;">
          Purchase</button>
        </form>
    </div>

    <script>
        const renderScreen = () => {
            let cart = JSON.parse(localStorage.getItem('cart'))

            if (cart == null)
                cart = []
            
            if (cart.length == 0)
                displayEmpty()
            else
                displayItems(cart)
        };

        const displayEmpty = () => {
            let content = "<br><br><h4>It seems you don't have any items in your cart!</h4><br><br>"

            document.getElementById("cart-holder").innerHTML = content
            document.getElementById("subtotal").innerHTML = `Subtotal: $${moneyFormat(0)}`
            document.getElementById("qst").innerHTML = `QST: $${moneyFormat(0)}`
            document.getElementById("gst").innerHTML = `GST: $${moneyFormat(0)}`
            document.getElementById("total-price").innerHTML = `TOTAL: $${moneyFormat(0)}`
        };

        const displayItems = (cart) => {
            let content = "<ul>"
            
            cart.forEach((element) => {
                content += `
                    <li>
                        <b >${element.amount} x $${element.price}</b>\t
                       <span style="margin-right:2%;"> ${element.name}</span><img style="max-width:80px;border: 4px solid #F5F5F5;" src=${element.image}>
                    </li>
                    <button type='button' class="btn btn-info" style="border-radius:17px;margin-right:1%;"onclick="decrementCart(${element.id})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
                 </button>

<button  type='button' class="btn btn-info" style="margin-right:14px;border-radius:17px;" type='button' class="btn btn-primary" onclick="incrementCart(${element.id})" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>  </button>
                    
<div id='remove-controls'>
        <button  style="border-radius:17px;" class="btn btn-info" type="button" onclick="remove(${element.id})" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 3 14 14">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/></svg>
          Remove from Cart
        </button>
      </div>
  
                    `  
            }) 



            content += "</ul>"
            const cartString = JSON.stringify(cart).replace(/"/g, '&quot;')
            content += `<input type="hidden" id="cart-data" name="cart-data" value="${cartString}">`

            const subtotal = cart.reduce((acc, element) => {
                return acc += element.amount * parseFloat(element.price)
            }, 0)

            document.getElementById("cart-holder").innerHTML = content
            document.getElementById("subtotal").innerHTML = `Subtotal: $${moneyFormat(subtotal)}`
            document.getElementById("qst").innerHTML = `QST: $${moneyFormat(subtotal * 0.09975)}`
            document.getElementById("gst").innerHTML = `GST: $${moneyFormat(subtotal * 0.05)}`
            document.getElementById("total-price").innerHTML = `TOTAL: $${moneyFormat(subtotal * 1.14975)}`
        };

        const moneyFormat = (price) => {
            return (Math.round(price * 100) / 100).toFixed(2)
        }

        const decrementCart = (id) => {
            let cart = JSON.parse(localStorage.getItem('cart'))

            cart.map((cartItem) => {
                if (cartItem.id == id)
                    cartItem.amount--
            })

            cart = cart.filter((cartItem) => {
                return (cartItem.amount > 0)
            })

            localStorage.setItem('cart', JSON.stringify(cart))

            renderScreen()
        }


    


        const incrementCart = (id) => {
            const cart = JSON.parse(localStorage.getItem('cart'))

            cart.map((cartItem) => {
                if (cartItem.id == id)
                    cartItem.amount++
            })

            localStorage.setItem('cart', JSON.stringify(cart))

            renderScreen()
        }


        renderScreen();



  


</script>   
@endsection
