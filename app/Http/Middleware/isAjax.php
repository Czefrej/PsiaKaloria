<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAjax
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
        if($request->ip() == env("APP_LOCALHOST") || $request->ajax())
            return $next($request);
        else return response("Unauthorized",403);
    }
}
