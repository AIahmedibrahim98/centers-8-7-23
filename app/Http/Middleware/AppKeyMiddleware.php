<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('X-KEY')) {
            if ($request->header('X-KEY') === env('PRODUCT_KEY')) {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Invalid PRODUCT KEY',
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'PRODUCT KEY required',
            ], 401);
        }
    }
}
