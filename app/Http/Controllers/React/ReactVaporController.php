<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactCollectionRequest;
use App\Models\FormSubmission;

class ReactVaporController
{
    public function create()
    {
        return view('uploads.react.vapor');
    }

    public function store(StoreReactCollectionRequest $request)
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
