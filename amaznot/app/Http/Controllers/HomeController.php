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
            $categories = Product::
                select('category')
                ->distinct()
                ->get();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }
        
        return view('pages.index', [
            'categories' => $categories
        ]);
    }
}
