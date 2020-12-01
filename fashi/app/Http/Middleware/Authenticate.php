<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // nếu cố tình vào đường dẫn dashboard mà chưa đăng nhập thì sẽ quay về trang login
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
