<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.attachment');
    }
}
