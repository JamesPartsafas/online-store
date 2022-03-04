<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Confirm User Logged in
        if ($redirect = parent::redirectOnAuthenticated())
        {
            return $redirect;
        }
        
        return view('auth.login');
    }

    
    public function store(Request $request)
    {   
        if ($redirect = parent::redirectOnAuthenticated())
        {
            return $redirect;
        }

        // Validation required by user
        $this->validate($request,
        [
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        // Confirm Login information with Database 
        if(!auth()->attempt($credentials))
        {
            return back()->with('status', 'Invalid login details'); 
        }

        return redirect()->route('home'); // Redirect to Product Page
    }
}
