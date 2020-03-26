<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);
    }
}
