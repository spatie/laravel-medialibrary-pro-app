<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\Blade\StoreBladeAttachmentRequest;
use App\Models\FormSubmission;

class LivewireAttachmentController
{
    public function __invoke()
    {
        return view('uploads.livewire.attachment');
    }
}
