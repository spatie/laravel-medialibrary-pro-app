<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\Vue\StoreVueAttachmentRequest;

class VueAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.vue.attachment');
    }

    public function store(StoreVueAttachmentRequest $request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ])
            ->addFromMediaLibraryRequest($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
