<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class FakeUser
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
        auth()->login(factory(User::class)->make());

        return $next($request);
    }
}
