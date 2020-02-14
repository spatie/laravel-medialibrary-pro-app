<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSingleUploadRequest;
use App\Models\FormSubmission;
use Spatie\MedialibraryPro\Concerns\HandlesTemporaryUploads;

class TestSingleUploadController extends Controller
{
    use HandlesTemporaryUploads;

    public function showForm()
    {
        return view('uploads.single');
    }

    public function store(StoreSingleUploadRequest $request)
    {
        $formSubmission = FormSubmission::create(['name' => $request->name]);

        $formSubmission
            ->addFromTemporaryUploads($request->avatar)
            ->toMediaCollection()

        $this->addToMedialibrary('avatar', $formSubmission);
    }
}
