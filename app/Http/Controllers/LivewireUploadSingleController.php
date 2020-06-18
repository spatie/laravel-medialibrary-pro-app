<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

class LivewireUploadSingleController
{
    use StoresFormSubmissions;

    public function create()
    {

        return view('uploads.livewire.single');
    }

    public function store(StoreMultipleUploadsRequest $request)
    {
        $fieldName = $request->media;



        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ])
            ->addMultipleMediaFromTemporaryUploads($request->media ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
