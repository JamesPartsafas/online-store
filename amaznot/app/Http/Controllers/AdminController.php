<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {   
        //Verify admin
        if ($redirect = parent::redirectOnNotAdmin($request))
        {
            return $redirect;
        }

        //Get categories
        try 
        {
            $categories = $this->getCategories();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }

        //Return view
        return view('pages.admin.addproduct', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {   
        //Verify admin
        if ($redirect = parent::redirectOnNotAdmin($request))
        {
            return $redirect;
        }

        //Validate input
        $this->validate($request,
        [
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'about' => 'required',
            'details' => 'required',
            'weight' => 'required|numeric',
            'image' => 'required'
        ]);

        //Input validated, create DB entry
        Product::create([
            'name' => $request->name,
            'category' => urldecode($request->category),
            'subcategory' => $request->subcategory,
            'price' => $request->price,
            'about' => $request->about,
            'details' => $request->details,
            'weight' => $request->weight,
            'image' => $request->image
        ]);

        //Get categories
        try 
        {
            $categories = $this->getCategories();
        }
        catch (Exception $ex)
        {
            return abort(404);
        }

        $customMessage = 'Product successfully added';

        //Return view
        return view('pages.admin.addproduct', [
            'categories' => $categories,
            'customMessage' => $customMessage
        ]);
    }

    private function getCategories()
    {
        return Product::
            select('category')
            ->distinct()
            ->get();
    }
}
