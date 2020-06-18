<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

class LivewireExperimentalController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate([]);

        return view('uploads.livewire.experimental', compact('formSubmission'));
    }

    public function store(StoreMultipleUploadsRequest $request)
    {
        ld($request->all());
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request, 'images')->toMediaCollection('images');

        $formSubmission
            ->syncFromMediaLibraryRequest($request, 'downloads')
            ->toMediaCollection('downloads');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
