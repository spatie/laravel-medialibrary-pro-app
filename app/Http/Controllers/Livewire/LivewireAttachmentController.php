<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\Livewire\StoreLivewireAttachmentRequest;
use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Http\Requests\StoreSingleAttachmentRequest;
use App\Models\FormSubmission;

class LivewireAttachmentController
{
    use StoresFormSubmissions;

    public function create()
    {
        return view('uploads.livewire.attachment');
    }

    public function store(StoreLivewireAttachmentRequest $request)
    {
        ld('in controller');

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing'
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
