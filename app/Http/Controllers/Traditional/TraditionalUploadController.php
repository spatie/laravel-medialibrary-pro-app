<?php

namespace App\Http\Controllers\Traditional;

use App\Http\Requests\Traditional\StoreRequest;
use App\Models\FormSubmission;

class TraditionalUploadController
{
    public function create()
    {
        return view('uploads.traditional.upload');
    }

    public function store(StoreRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ]);

        $formSubmission
            ->addMediaFromRequest('file')
            ->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
