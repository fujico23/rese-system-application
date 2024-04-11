<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //ログインユーザーの場合は、ログインユーザーのrole_idを変数にいれる
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
            //そうでなければ$role_idはnull処理する
        } else {
            $role_id = null;
        }

        View::share('role_id', $role_id);

        return $next($request);
    }
}
