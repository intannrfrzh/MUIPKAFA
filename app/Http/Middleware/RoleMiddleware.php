<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Middleware\StartSession;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            if (!Auth::check()) {
                // Debugging log
                \Log::debug('User not authenticated.');
                return redirect('/');
            }
        
            $userRole = Auth::user()->role;
            \Log::debug('User Role: ' . $userRole);
        
            if (!in_array($userRole, $roles)) {
                // Debugging log
                \Log::debug('User role not authorized.');
                return redirect('/');
            }
        
            return $next($request);
        }

        return $next($request);
    }
}
