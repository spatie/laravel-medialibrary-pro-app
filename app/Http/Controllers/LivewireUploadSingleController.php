<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class LivewireUploadSingleController
{
    use StoresFormSubmissions;

    public function create()
    {

        return view('uploads.livewire.single');
    }
}
