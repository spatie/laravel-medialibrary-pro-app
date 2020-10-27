<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactAttachmentRequest;
use App\Models\FormSubmission;

class ReactAttachmentController
{
    public function create()
    {
        return view('uploads.react.attachment');
    }

    public function store(StoreReactAttachmentRequest $request)
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
