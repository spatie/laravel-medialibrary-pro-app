<?php

namespace App\Http\Controllers\Blade;

use App\Http\Requests\StoreSingleAttachmentRequest;
use App\Models\FormSubmission;

class BladeVaporController
{
    public function create()
    {
        return view('uploads.blade.attachment');
    }

    public function store(StoreSingleAttachmentRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images', 's3');

        flash()->success('Your form has been submitted');

        return back();
    }
}
