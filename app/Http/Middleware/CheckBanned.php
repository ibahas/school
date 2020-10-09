<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if (auth()->check() && auth()->user()->status == "0") {
        auth()->logout();
        $message = 'الحساب تم تعطيله يرجى مراجعة مدير المدرسة.';
        return redirect()->route('login')->with('alert', $message);
        // alert()->warning('الحساب تم تعطيله يرجى مراجعة مدير المدرسة');
        // return redirect()->route('login');
    }else{
        return $next($request);

    }
    }
}
