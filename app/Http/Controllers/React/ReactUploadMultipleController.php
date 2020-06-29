<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactUploadMultipleController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.multiple');
    }
}
