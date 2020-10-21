<?php

namespace App\Http\Controllers\Blade;

use App\Http\Requests\Blade\StoreBladeCollectionCustomPropertyRequest;
use App\Models\FormSubmission;

class BladeCollectionCustomPropertyController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        return view('uploads.blade.collection-custom-property', compact('formSubmission'));
    }

    public function store(StoreBladeCollectionCustomPropertyRequest $request)
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
