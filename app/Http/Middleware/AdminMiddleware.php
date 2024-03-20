<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->is_admin == 1) {
                $response = $next($request);
                $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

                return $response;
            } else {
                Auth::logout();
                return redirect('admin');
            }
        } else {
            Auth::logout();
            return redirect('admin');
        }
    }
}
