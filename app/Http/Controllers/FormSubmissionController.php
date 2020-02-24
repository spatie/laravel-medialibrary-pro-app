<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSingleUploadRequest;
use App\Models\FormSubmission;
use Spatie\MedialibraryPro\Tests\Http\Controllers\UploadControllerTest;

class FormSubmissionController
{
    public function showVue()
    {
        return view('uploads.multi-vue');
    }

    public function showReact()
    {
        return view('uploads.multi-react');
    }

    public function store(StoreSingleUploadRequest $request)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => $request->name ?? 'nothing'])
            ->addMultipleMediaFromTemporaryUploads($request->media)->each->toMediaCollection('images');

        return back();
    }
}
