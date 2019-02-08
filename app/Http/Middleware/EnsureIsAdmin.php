<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EnsureIsAdmin
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
      if(Auth::check()){
        if(Auth::user()->role->name === 'admin'){
          return $next($request);
        }
        return redirect()->route('posts.index');
      }
      return redirect()->route('login');
    }
}
