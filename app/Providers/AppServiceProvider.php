<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        ld('in app service provider');
        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);
    }
}
