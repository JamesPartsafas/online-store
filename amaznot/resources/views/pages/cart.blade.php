@extends('layouts.layout')

@section('content')
    
    <div class="cart-items">
        <div id="cart-holder">
    
        </div>
    
        <div id="price-holder">
            <p id="subtotal"></p>
            <p id="qst"></p>
            <p id="gst"></p>
            <h2 id="total-price"></h2>
        </div>
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
            
            cart.forEach((element) => {
                content += `
                    <li>
                        <b>${element.amount} x $${element.price}</b>\t
                        ${element.name}<img style="max-width:80px" src=${element.image}>
                    </li>
                `
            })

            content += "</ul>"

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
