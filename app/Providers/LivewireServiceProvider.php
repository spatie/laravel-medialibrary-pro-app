<?php

namespace App\Providers;

use App\Http\Components\Livewire\UploadSingleComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireServiceProvider extends ServiceProvider
{
    public function register()
    {
        Livewire::component('upload-single', UploadSingleComponent::class);
    }
}
