<?php

namespace App\Providers;

use App\Http\Components\MediaLibraryUploadComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('media-library-upload', MediaLibraryUploadComponent::class);
    }
}
