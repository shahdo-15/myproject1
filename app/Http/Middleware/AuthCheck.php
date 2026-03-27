<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user')) {
            // المستخدم غير مسجل الدخول → إعادة توجيه لصفحة login
            return redirect('/login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        return $next($request);
    }
}