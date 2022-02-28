@extends('layouts.layout')

@section('content')
    
    <div class="cart-items">
        <form action="{{ route('orders') }}" method="post">

            @csrf

            <div id="cart-holder">
     
            </div>
        
            <div id="price-holder">
                <p id="subtotal"></p>
                <p id="qst"></p>
                <p id="gst"></p>
                <h2 id="total-price"></h2>

            </div>
         
                    </button>
            <label for="credit_card" style="color:red">
                WARNING: Input not secure. Do not enter sensitive data
            </label>
            <input type="text" id="credit_card" name="credit_card" placeholder="Fake Credit Card Number">
            @error('credit_card')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            
            <button type = "submit">Purchase</button>
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
            let content = "<h4>It seems you don't have any items in your cart!</h4>"

            document.getElementById("cart-holder").innerHTML = content
            document.getElementById("subtotal").innerHTML = `Subtotal: $${moneyFormat(0)}`
            document.getElementById("qst").innerHTML = `QST: $${moneyFormat(0)}`
            document.getElementById("gst").innerHTML = `GST: $${moneyFormat(0)}`
            document.getElementById("total-price").innerHTML = `TOTAL: $${moneyFormat(0)}`
        };

        const displayItems = (cart) => {
            let content = "<ul>"
            
            cart.forEach((element,index) => {
                content += `
                    <li>
                        <b ><span id=${index}>${element.amount}</span> x $${element.price}</b>\t
                        ${element.name}<img style="max-width:80px" src=${element.image}>
                    </li>
                    <button type='button' class="btn btn-info" style="border-radius:17px;"onclick="decrement1(${index})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
                 </button>

<button  type='button' class="btn btn-info" style="margin-right:14px;border-radius:17px;" type='button' class="btn btn-primary" onclick="increment1(${index})" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>  </button>
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


        renderScreen();



</script>   
@endsection
