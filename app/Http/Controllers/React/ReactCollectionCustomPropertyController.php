<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactCollectionCustomPropertyRequest;
use App\Models\FormSubmission;

class ReactCollectionCustomPropertyController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
        
        $images = $formSubmission->getMedia('images');

        return view('uploads.react.collection-custom-property', compact('images', 'formSubmission'));
    }

    public function store(StoreReactCollectionCustomPropertyRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->images)
            ->withCustomProperties('extra_field')
            ->toMediaCollection('images');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
