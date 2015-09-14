<?php

namespace App\Http\Middleware;

use Closure;

class OldMiddleware
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
//      echo $request;
      if ($request->input('title') > 500)
      {
        return response('無理', 500);
      }

        return $next($request);
    }
}
