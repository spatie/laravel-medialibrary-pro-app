<?php

namespace App\Http\Controllers\Concerns;

use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

trait StoresFormSubmissions
{
    public function store(StoreMultipleUploadsRequest $request)
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
