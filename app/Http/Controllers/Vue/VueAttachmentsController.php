<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueAttachmentsRequest;
use App\Models\FormSubmission;

class VueAttachmentsController
{
    public function create()
    {
        return view('uploads.vue.attachments');
    }

    public function store(StoreVueAttachmentsRequest$request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ])
            ->addMultipleMediaFromTemporaryUploads($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
