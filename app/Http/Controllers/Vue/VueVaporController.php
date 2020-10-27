<?php

namespace App\Http\Controllers\Vue;

use App\Http\Requests\Vue\StoreVueCollectionRequest;
use App\Models\FormSubmission;

class VueVaporController
{
    public function create()
    {
        return view('uploads.vue.vapor');
    }

    public function store(StoreVueCollectionRequest $request)
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
