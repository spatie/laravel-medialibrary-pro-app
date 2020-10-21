<?php

namespace App\Http\Controllers\Blade;

use App\Http\Requests\Blade\StoreBladeCollectionRequest;
use App\Models\FormSubmission;

class BladeCollectionController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        return view('uploads.blade.collection', compact('formSubmission'));
    }

    public function store(StoreBladeCollectionRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->images)
            ->toMediaCollection('images');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
