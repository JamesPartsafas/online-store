<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {   
        if ($redirect = parent::redirectOnNotAdmin($request))
        {
            return $redirect;
        }

        return view('pages.admin.addproduct');
    }
}
