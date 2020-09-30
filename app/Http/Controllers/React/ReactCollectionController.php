<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactCollectionRequest;
use App\Models\FormSubmission;

class ReactCollectionController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        $images = $formSubmission->getMedia('images');
        $downloads = $formSubmission->getMedia('downloads');

        return view('uploads.react.collection', compact('images', 'downloads', 'formSubmission'));
    }

    public function store(StoreReactCollectionRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->images)
            ->toMediaCollection('images');

        $formSubmission
            ->syncFromMediaLibraryRequest($request->downloads)
            ->toMediaCollection('downloads');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
