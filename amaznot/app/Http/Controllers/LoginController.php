<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    
    public function store(Request $request)
    {   
        // Validate
        $this->validate($request,
        [
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);

        // Sign in User
        if(!auth()->attempt($request-> only('name', 'password')))
        {
            return back()->with('status', 'Invalid login details');
        }

        // Redirect User 
        if(auth()->user()->where('name', 1)->first());
        {
            return redirect()->route('productlist'); 
        }
        return redirect()->route('home');
    }
}
