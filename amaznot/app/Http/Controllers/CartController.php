<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function index(Request $request)
    {
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        return view('pages.cart');
    }
}
