<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try 
        {
            $products = Product::select('id', 'name', 'category', 'price', 'image')
            ->inRandomOrder()
            ->limit(3)
            ->get();

            //PLEASE DON'T DELETE COMMENTED CODE
            //WILL TEST THESE OUT LATER 
            //THANKS! -JAN

            // $product = Product::
            //     select('id', 'name', 'category', 'subcategory', 'price', 'about', 'details', 'weight', 'image')
            //     ->where('id', $id)
            //     ->firstOrFail();

            //$products= Product::find([1, 2, 3, 4, 5]);

            // $products= Product::select('category')
            // ->find([1, 2, 3]);

            //$clothing = Product::find[1, 2, 3];

            // $categories = Product::
            //     select('category')
            //     ->distinct()
            //     ->get();
            
                // $products = Product::inRandomOrder()->limit(4)->get();
                // $product = Product::
                // select('id', 'name', 'category', 'subcategory', 'price', 'about', 'details', 'weight', 'image')
                // ->firstOrFail();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }
        
        return view('pages.index', [
            'products' => $products
        ]);
    }
}
