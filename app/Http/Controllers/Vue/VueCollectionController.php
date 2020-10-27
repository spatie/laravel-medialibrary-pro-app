<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueCollectionRequest;
use App\Models\FormSubmission;

class VueCollectionController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        $images = $formSubmission->getMedia('images');
        $downloads = $formSubmission->getMedia('downloads');

        return view('uploads.vue.collection', compact('images', 'downloads', 'formSubmission'));
    }

    public function store(StoreVueCollectionRequest $request)
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
