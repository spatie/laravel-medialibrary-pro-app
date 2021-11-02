<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueAttachmentsRequest;
use App\Models\FormSubmission;

class VueAsyncAttachmentsController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
        
        $images = $formSubmission->getMedia('images');
        $name = $formSubmission->name;

        return view('uploads.vue.async-attachments', compact('images', 'name'));
    }

    public function store(StoreVueAttachmentsRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::first();

        $formSubmission
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images');

        $formSubmission->name = $request->name;
        $formSubmission->save();

        return response()->json([
            'success' => 'true'
        ]);
    }
}
