<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class isEmailVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->is_email_verified) {
            auth()->logout();
            return redirect()->route('login')->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return $next($request);
    }
}