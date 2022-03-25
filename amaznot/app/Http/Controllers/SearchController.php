<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->route('query');
        $query = urldecode($query);

        try 
        {
            $products = Product::select('id', 'name', 'category', 'price', 'image')
            ->where('name', $query)
            ->orWhere('name', 'like', '%' . $query . '%')
            ->orWhere('details', 'like', '%' . $query . '%')
            ->limit(21)
            ->get();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }
        
        return view('pages.search', [
            'products' => $products
        ]);
    }
}
