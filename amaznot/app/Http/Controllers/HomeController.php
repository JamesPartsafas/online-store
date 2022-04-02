<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Query 3 random items for front page
     *
     * @return product array
     */
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

    /**
     * Route to disclaimer page.
     *
     * @return route to disclaimer
     */
    public function disclaimer ()
    {
        return view('pages.disclaimer');
    }

    /**
     * Route to contact us page.
     *
     * @return route to contact us
     */
    public function contactus ()
    {
        return view('pages.contactus');
    }
}
