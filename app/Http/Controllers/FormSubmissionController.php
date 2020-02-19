<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSingleUploadRequest;
use App\Models\FormSubmission;
use Spatie\MedialibraryPro\Tests\Http\Controllers\UploadControllerTest;

class FormSubmissionController
{
    public function showForm()
    {
        return view('uploads.single');
    }

    public function store(StoreSingleUploadRequest $request)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => $request->name]);

        $formSubmission
            ->addMediaFromTemporaryUpload($request->image)
            ->toMediaCollection();
    }
}
