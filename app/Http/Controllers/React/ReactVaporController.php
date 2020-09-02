<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactVaporController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.vapor');
    }
}
