<?php

namespace App\Http\Controllers\Livewire;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class LivewireVaporController
{
    public function create()
    {
        return view('uploads.livewire.attachment-single');
    }

    public function store(Request $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images', 's3');

        flash()->success('Your form has been submitted');

        return back();
    }
}
