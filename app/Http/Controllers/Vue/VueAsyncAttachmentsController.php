<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueAttachmentsRequest;
use App\Models\FormSubmission;

class VueAsyncAttachmentsController
{
    public function create()
    {
        return view('uploads.vue.async-attachments');
    }

    public function store(StoreVueAttachmentsRequest $request)
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
