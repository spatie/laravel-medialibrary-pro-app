<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueCollectionCustomPropertyRequest;
use App\Models\FormSubmission;

class VueCollectionCustomPropertyController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        $images = $formSubmission->getMedia('images');

        return view('uploads.vue.collection-custom-property', compact('images', 'formSubmission'));
    }

    public function store(StoreVueCollectionCustomPropertyRequest $request)
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
