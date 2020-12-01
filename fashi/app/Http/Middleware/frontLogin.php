<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class frontLogin
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
        // neu khong co tk hoac chua dang nhap thi ve trang dang nhap
        if(empty(Session::has('frontSession')))
        {
            return redirect('/userLogin');
        }
        return $next($request);
    }
}
