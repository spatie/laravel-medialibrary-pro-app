<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class VueUploadSingleController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.vue.single');
    }
}
