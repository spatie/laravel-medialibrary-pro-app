<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

class LivewireUploadMultipleController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate([]);

        return view('uploads.livewire.multiple', compact('formSubmission'));
    }

    public function store(StoreMultipleUploadsRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->addFromMediaLibraryRequest('media', $request)
            ->each->toMediaCollection('images');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        flash()->success('Your form has been submitted');

        return back();
    }
}
