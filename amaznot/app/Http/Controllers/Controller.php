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

    /**
     * Redirect to home after authentication
     *
     * @return recirect to home
     */
    protected function redirectOnAuthenticated()
    {
        if(auth()->check())
        {
            return redirect()->route('home');
        }
    }

    /**
     * Redirect to home if not admin.
     *
     * @return redirect to home
     */
    protected function redirectOnNotAdmin(Request $request)
    {
        if(!auth()->check() || $request->user()->role !== 'admin')
        {
            return redirect()->route('home');
        }
    }

    /**
     * Redirect to home if not user.
     *
     * @return redirect to home
     */
    protected function redirectOnNotUser(Request $request)
    {
        if(!auth()->check() || $request->user()->role !== 'user')
        {
            return redirect()->route('home');
        }
    }
}
