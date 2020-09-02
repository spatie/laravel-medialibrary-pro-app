<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Concerns\StoresFormSubmissions;

class VueAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.vue.attachment');
    }

    public function store($request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ])
            ->addMultipleMediaFromTemporaryUploads($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
