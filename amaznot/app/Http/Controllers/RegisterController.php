<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {   
        // Validate
        $this->validate($request,
        [
            'name' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Store new user
        User::create([
            'name' => $request->name,
            'role' => 'user',
            'password' => $request->password,
        ]);

        // Sign in User
        auth()->attempt($request-> only('name', 'password'));

        // Redirect User 
        /* Please notify me which file to is storing the database for the ridirect*/ 
        return redirect()->route('home'); 

    }
}
