<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetUserIdInSession
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $request->session()->put('User_ID', Auth::user()->User_ID);
        }

        return $next($request);
    }
}
