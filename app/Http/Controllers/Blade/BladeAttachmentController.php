<?php

namespace App\Http\Controllers\Blade;

use App\Http\Requests\Blade\StoreBladeAttachmentRequest;
use App\Models\FormSubmission;

class BladeAttachmentController
{
    public function create()
    {
        return view('uploads.blade.attachment');
    }

    public function store(StoreBladeAttachmentRequest $request)
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
