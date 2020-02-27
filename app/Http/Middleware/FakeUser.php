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
        auth()->login(User::make([
            'name' => 'Dummy',
            'email' => 'john@example.com',
        ]));

        return $next($request);
    }
}
