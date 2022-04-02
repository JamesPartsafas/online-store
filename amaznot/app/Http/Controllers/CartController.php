<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Redirect to home if not a user, else redirect to cart page.
     *
     * @return redirect
     */
    function index(Request $request)
    {
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        return view('pages.cart');
    }
}
