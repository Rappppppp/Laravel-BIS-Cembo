<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        if (!$user || !in_array($user->role, $roles)) {
            // if ($user->role === 'UnregisteredResident') {
            //     return redirect('/fillupregistration');
            // }
            return redirect()->route('user.homepage'); //abort(403);
        }
        return $next($request);
    }

}