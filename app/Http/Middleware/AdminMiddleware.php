<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role != 'admin') {
            Auth::logout();

            return App::abort(403, "Forbidden");
        }

        return $next($request);
    }
}
