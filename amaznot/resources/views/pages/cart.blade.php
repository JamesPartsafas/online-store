@extends('layouts.layout')

@section('content')
    
    <div class="cart-items">
        <form action="{{ route('orders') }}" method="post">
            <div id='remove-controls'>
                <button style="border-radius:17px;margin-top:1%;margin-left:2%;" class="btn btn-info" type="button" onclick="empty()" >
                    <i class="fas fa-shopping-cart"></i> &nbsp; Empty the  cart 
                </button>
            </div>

            @csrf
            <div id="cart-holder"  class="card text-dark bg-light"style="border: 4px solid #F5F5F5;"></div>
            <div id="price-holder" class="card text-dark bg-light"style="border: 4px solid #F5F5F5;">
                <p id="subtotal"></p>
                <p id="qst"></p>
                <p id="gst"></p>
                <h2 id="total-price"></h2>
            </div>

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
                Purchase
            </button>
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

    // displays a message if empty
        const displayEmpty = () => {
            let content = "<br><br><h4>It seems you don't have any items in your cart!</h4><br><br>"
            document.getElementById("cart-holder").innerHTML = content
            document.getElementById("subtotal").innerHTML = `Subtotal: $${moneyFormat(0)}`
            document.getElementById("qst").innerHTML = `QST: $${moneyFormat(0)}`
            document.getElementById("gst").innerHTML = `GST: $${moneyFormat(0)}`
            document.getElementById("total-price").innerHTML = `TOTAL: $${moneyFormat(0)}`
        };
    
    // displays items in the cart
        const displayItems = (cart) => {
            let content = " <ul>"
            cart.forEach((element) => {
                content += 
            `
                <li>
                    <img style="max-width:80px;border: 4px solid #F5F5F5;" src=${element.image}><span style="margin-right:3%;margin-left:2%;font-size:20px;"><b> ${element.name}<b></span>${element.amount} x $${element.price}
                </li>
                <button type='button' class="btn btn-info" style="border-radius:17px;margin-right:1%;"onclick="decrementCart(${element.id})">
                    <i class="fas fa-minus-square"></i>
                </button>
                <button type='button' class="btn btn-info" style="margin-right:14px;border-radius:17px;" type='button' class="btn btn-primary" onclick="incrementCart(${element.id})" >
                    <i class="fas fa-plus-square"></i>
                </button>
                    
                <button  style="border-radius:17px;" class="btn btn-info" type="button" onclick="remove(${element.id})" >
                    <i class="fas fa-cart-arrow-down"></i> &nbsp; Remove from Cart
                </button>
      
                <br/>
                <br/>
                <br/>           
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
        const moneyFormat = (price) => {return (Math.round(price * 100) / 100).toFixed(2)
        }

    //  decreases the quantity of the item 
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

    //  empties the whole cart
        const empty = () => {
            let cart = JSON.parse(localStorage.getItem('cart'))
            cart = cart.filter((cartItem) => {
                return (cartItem.amount < 0)
            })
            localStorage.setItem('cart', JSON.stringify(cart))
            renderScreen()
        }

    //  removes the specific item from the cart
        const remove = (id) => {
        let cart= JSON.parse(localStorage.getItem('cart'))
            cart = cart.filter((cartItem) => {
            return (cartItem.id != id)
        })      
        localStorage.setItem('cart', JSON.stringify(cart))
        renderScreen()
        }
    

    //  increases the quantity of the item 
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
