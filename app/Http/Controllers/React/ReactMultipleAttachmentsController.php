<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class ReactMultipleAttachmentsController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.react.multiple-attachments');
    }
}
