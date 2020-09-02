<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactAttachmentsController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.attachments');
    }
}
