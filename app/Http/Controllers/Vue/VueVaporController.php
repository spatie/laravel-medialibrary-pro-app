<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\Vue\StoreVueCollectionRequest;
use App\Models\FormSubmission;

class VueVaporController
{
    public function create()
    {
        return view('uploads.vue.vapor');
    }

    public function store(StoreVueCollectionRequest $request)
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
