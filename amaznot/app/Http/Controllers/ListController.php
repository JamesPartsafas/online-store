<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $product = Product::where('id', 1)->first();

        return view('pages.productlist', ["product" => $product]);
    }
}
