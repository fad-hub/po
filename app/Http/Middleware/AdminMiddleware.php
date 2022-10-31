<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == User::ROLE_ADMIN) {
            return $next($request);
        }

        return response()->json([
            'error' => 'Anda tidak memili akses'
        ]);
    }
}
