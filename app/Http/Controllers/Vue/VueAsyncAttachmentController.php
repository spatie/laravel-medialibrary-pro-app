<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueAttachmentRequest;

class VueAsyncAttachmentController
{
    public function create()
    {
        return view('uploads.vue.async-attachment');
    }

    public function store(StoreVueAttachmentRequest $request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ])
            ->addFromMediaLibraryRequest($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
