<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        try 
        {
            $products = Product::select('id', 'name', 'category', 'price', 'image')
            ->where('name', $query)
            ->orWhere('name', 'ilike', '%' . $query . '%') // Search Product Via Names
            ->orWhere('about', 'ilike', '%' . $query . '%') // Search Product Description
            ->orWhere('details', 'ilike', '%' . $query . '%') // Search Product Details
            ->limit(21) // 21 Item Search Limit
            ->get();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }
        
        return view('pages.search', [
            'products' => $products,
            'query' => $query
        ]);
    }
}
