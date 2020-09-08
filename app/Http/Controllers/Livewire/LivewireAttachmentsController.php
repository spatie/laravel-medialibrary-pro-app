<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\Livewire\StoreLivewireAttachmentsRequest;
use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;

class LivewireAttachmentsController
{
    public function create()
    {
        return view('uploads.livewire.attachments');
    }

    public function store(StoreLivewireAttachmentsRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
