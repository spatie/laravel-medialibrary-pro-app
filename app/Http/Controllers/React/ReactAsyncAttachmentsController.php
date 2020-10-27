<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactAttachmentsRequest;
use App\Models\FormSubmission;

class ReactAsyncAttachmentsController
{
    public function create()
    {
        return view('uploads.react.async-attachments');
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

        return response()->json([
            'success' => 'true'
        ]);
    }
}
