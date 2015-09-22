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
//      $this->app->Http->Middleware->contentType("posts/create; charset=utf-8");
//      echo $request;
      if ($request->input('title') > 5000)
      {
        return response('5000以上のtitleは無理やし', 500);
      }

        return $next($request);
    }
}
