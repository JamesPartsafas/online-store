<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');

        try
        {
            $product = Product::
                select('id', 'name', 'category', 'subcategory', 'price', 'about', 'details', 'weight', 'image')
                ->where('id', $id)
                ->firstOrFail();
        }
        catch (QueryException $ex)
        {
            return abort(404);
        }
        
        $userCanAddToCart = false;
        if (!parent::redirectOnNotUser($request))
        {
            $userCanAddToCart = true;
        }

        return view('pages.productpage', [
            'product' => $product,
            'userCanAddToCart' => $userCanAddToCart
        ]);
    }
}
