<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class VueMultipleAttachmentsController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.vue.attachment-multiple');
    }
}
