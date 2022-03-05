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
        }
        catch (Exception $ex)
        {
            return abort(404);
        }
        
        return view('pages.index', [
            'products' => $products
        ]);
    }

    public function disclaimer ()
    {
        return view('pages.disclaimer');
    }

    public function deals ()
    {
        return view('pages.deals');
    }

    public function contactus ()
    {
        return view('pages.contactus');
    }
}
