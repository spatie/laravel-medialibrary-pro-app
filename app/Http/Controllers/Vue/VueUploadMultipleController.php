<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class VueUploadMultipleController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.vue.multiple');
    }
}
