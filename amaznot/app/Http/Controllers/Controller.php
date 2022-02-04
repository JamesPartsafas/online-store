<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function redirectOnUnauthenticated()
    {
        if(auth()->check())
        {
            return redirect()->route('home');
        }
    }

    protected function redirectOnNotAdmin(Request $request)
    {
        if(!auth()->check() || $request->user()->role !== 'admin')
        {
            return redirect()->route('home');
        }
    }
}
