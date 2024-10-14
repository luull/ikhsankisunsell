<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user_data')) {
            Auth::logout(); // Log out the user if the session has expired
            return redirect()->route('login')->with('message', 'Session expired. Please log in again.');
        }

        return $next($request);
    }
}
