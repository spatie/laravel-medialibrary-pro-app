<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactUploadSingleController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.single');
    }
}
