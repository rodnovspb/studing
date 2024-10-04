<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class AppendCitySlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($sessionSlug = Session::get('slug')) {
            URL::defaults(['slug' => $sessionSlug]);
        }

        return $next($request);
    }
}
