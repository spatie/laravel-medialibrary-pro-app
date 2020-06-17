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
        $fieldName = $request->fieldName();

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::whereName('livewire multiple')->first()
            ->syncCollection($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }
}
