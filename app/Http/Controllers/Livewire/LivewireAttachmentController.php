<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\Livewire\StoreLivewireAttachmentRequest;
use App\Models\FormSubmission;

class LivewireAttachmentController
{
    public function create()
    {
        return view('uploads.livewire.attachment');
    }

    public function store(StoreLivewireAttachmentRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
