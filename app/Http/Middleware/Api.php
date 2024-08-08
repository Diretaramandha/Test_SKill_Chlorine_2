<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = Auth::check()) {
            # code...
            return response()->json([
                'status' => 'success',
                'user' => $user,
            ]);
        }
        return response()->json([
            'status' => 'failed',
            'user' => $user
        ]);
    }
}
