<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactAttachmentRequest;
use App\Models\FormSubmission;

class ReactAsyncAttachmentController
{
    public function create()
    {
        return view('uploads.react.async-attachment');
    }

    public function store(StoreReactAttachmentRequest $request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ])
            ->addMultipleMediaFromTemporaryUploads($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
