<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;    //check login


class AdminLoginMiddleware
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
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->quyen == 1)
            {
                return $next($request);
            }
            else if ($user->quyen == 0)
            {
                return redirect()->route('admin_domain_detail');
            }
            else{
                return redirect()->route('login_get');
            }
        }
        else{
            return redirect()->route('login_get');
        }
    }
}
