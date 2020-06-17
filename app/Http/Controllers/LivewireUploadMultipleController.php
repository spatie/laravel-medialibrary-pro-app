<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\StoresFormSubmissions;
use App\Http\Requests\StoreMultipleUploadsRequest;
use App\Models\FormSubmission;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LivewireUploadMultipleController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['name' => 'livewire multiple']);

        return view('uploads.livewire.multiple', compact('formSubmission'));
    }

    public function store(StoreMultipleUploadsRequest $request)
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::whereName('livewire multiple')->first()
            ->addFromMediaLibraryRequest('media', $request)
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
