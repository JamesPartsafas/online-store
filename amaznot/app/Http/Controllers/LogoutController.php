<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{  
    /**
     * Log user out and redirect to home.
     *
     * @return redirect to home
     */
    public function store(Request $request)
    {   
        auth()->logout();
        return redirect()->route('home');
    }
}
