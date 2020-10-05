<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\Livewire\StoreLivewireCollectionCustomPropertyRequest;
use App\Models\FormSubmission;

class LivewireCollectionCustomPropertyController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);

        return view('uploads.livewire.collection-custom-property', compact('formSubmission'));
    }

    public function store(StoreLivewireCollectionCustomPropertyRequest $request)
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
