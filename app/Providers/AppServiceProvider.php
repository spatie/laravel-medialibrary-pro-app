<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot() {

        //auth()->logout();
        if ($user = User::find(1)) {
           //auth()->login($user);
        }
    }

    public function register()
    {
        ld('in app service provider');
        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);
    }
}
