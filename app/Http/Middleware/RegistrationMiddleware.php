<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegistrationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (empty($user->email_verified_at)) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}