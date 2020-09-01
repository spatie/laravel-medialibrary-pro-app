<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactSingleAsyncAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.single-async-attachment');
    }
}
