<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if ($redirect = parent::redirectOnUnauthenticated())
        {
            return $redirect;
        }
        
        return view('auth.login');
    }

    
    public function store(Request $request)
    {   
        if ($redirect = parent::redirectOnUnauthenticated())
        {
            return $redirect;
        }

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

        return redirect()->route('home');
    }
}
