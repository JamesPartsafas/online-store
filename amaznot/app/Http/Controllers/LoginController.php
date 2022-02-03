<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Check if user is already signed in
        if(auth()->check())
        {
            return redirect()->route('home');
        }
        
        return view('auth.login');
    }

    
    public function store(Request $request)
    {   
        // Validate
        $this->validate($request,
        [
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        // Sign in User
        if(!auth()->attempt($credentials))
        {
            return back()->with('status', 'Invalid login details');
        }

        // Redirect User 
        if(auth()->user()->only('admin')); // HCecks for Admin accounts
        {
            return redirect()->route('home'); 
        }

        return redirect()->route('home');
    }
}
