<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
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
//        return redirect('/');
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->back();
        }
//        $userId = Auth::id();
//        $user = User::find($userId);
//        if (!$user->email == "admin@mail.com") {
//            return redirect()->back();
//        }
        return $next($request);
    }
}
