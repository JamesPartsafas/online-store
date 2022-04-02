<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Query database for all items, categories, and subcategories.
     *
     * @return product list
     */
    public function index(Request $request)
    {
        try 
        {
            $category = $request->route('category');
            $category = urldecode($category);
            
            $subcategory = $request->query('subcategory');
            $subcategory = urldecode($subcategory);

            //Get product list for page
            $products = Product::
                select('id', 'name', 'price', 'image', 'category')
                ->where('category', $category)
                ->when($subcategory, function ($query) use ($subcategory) {
                    return $query->where('subcategory', $subcategory);
                })
                ->paginate(12);

            if ($products->isEmpty())
                throw new Exception();

            //Get list of subcategories
            $subcategories = Product::
                select('subcategory')
                ->distinct()
                ->where('category', $category)
                ->get();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }

        return view('pages.productlist', [
            'products' => $products,
            'subcategories' => $subcategories
        ]);
    }
}
