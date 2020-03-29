<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserHasGroup
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
        if (auth()->user()->isUser() && !auth()->user()->group) {
            return abort(401);
        }

        return $next($request);
    }
}
