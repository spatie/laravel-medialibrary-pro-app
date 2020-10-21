<?php

namespace App\Http\Controllers\Blade;

use App\Http\Requests\Blade\StoreBladeAttachmentsRequest;
use App\Models\FormSubmission;

class BladeAttachmentsController
{
    public function create()
    {
        return view('uploads.blade.attachments');
    }

    public function store(StoreBladeAttachmentsRequest $request)
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
