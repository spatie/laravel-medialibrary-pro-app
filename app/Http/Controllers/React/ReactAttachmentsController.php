<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactAttachmentsRequest;
use App\Models\FormSubmission;

class ReactAttachmentsController
{
    public function create()
    {
        return view('uploads.react.attachments');
    }

    public function store(StoreReactAttachmentsRequest $request)
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
