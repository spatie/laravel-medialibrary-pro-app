<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactAsyncCollectionController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.async-collection');
    }
}
