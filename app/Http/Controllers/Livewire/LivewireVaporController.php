<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\StoreSingleAttachmentRequest;
use App\Models\FormSubmission;

class LivewireVaporController
{
    public function create()
    {
        return view('uploads.livewire.single-attachment');
    }

    public function store(StoreSingleAttachmentRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images', 's3');

        flash()->success('Your form has been submitted');

        return back();
    }
}
