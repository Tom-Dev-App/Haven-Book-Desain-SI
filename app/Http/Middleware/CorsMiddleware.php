<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define the allowed origins
        $allowedOrigins = [
            '*',
          	'https://www.havenbook.my.id/storage/*'
        ];

        // Define the allowed headers and methods
        $allowedHeaders = 'Content-Type, Authorization';
        $allowedMethods = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';

        // Check if the request origin is allowed
        $origin = $request->headers->get('Origin');
        if (in_array($origin, $allowedOrigins)) {
            $response = $next($request);
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Headers', $allowedHeaders);
            $response->headers->set('Access-Control-Allow-Methods', $allowedMethods);
            return $response;
        }

        return $next($request);
    }
}
