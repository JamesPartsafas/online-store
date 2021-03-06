<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Redirect if user is logged in, else proceed to registration.
     *
     * @return redirect
     */
    public function index()
    {
        if ($redirect = parent::redirectOnAuthenticated())
        {
            return $redirect;
        }

        return view('auth.register');
    }

    /**
     * Validate registration information.
     *
     * @return redirect to home
     */
    public function store(Request $request)
    {   
        if ($redirect = parent::redirectOnAuthenticated())
        {
            return $redirect;
        }

        // Validate
        $this->validate($request,
        [
            'name' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        // Store new user
        User::create([
            'name' => $request['name'],
            'role' => 'user',
            'password' => Hash::make($request['password'])
        ]);

        // Sign in User
        auth()->attempt($request-> only('name', 'password'));

        // Redirect User 
        /* Please notify me which file to is storing the database for the ridirect*/ 
        return redirect()->route('home'); 

    }
}
