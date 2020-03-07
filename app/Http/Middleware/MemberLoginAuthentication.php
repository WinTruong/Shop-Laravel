<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Middleware\Authenticate as Middleware;

class MemberLoginAuthentication
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
        // Xóa dòng này để đăng xuất bằng member/logout bằng user level 1 ~ admin  && Auth::user()->level == 0
        if (Auth::check()) {
            return $next($request);
        } else {
            return redirect('/member/login');
        }
    }
}
