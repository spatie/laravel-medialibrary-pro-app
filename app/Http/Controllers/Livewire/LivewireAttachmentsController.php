<?php

namespace App\Http\Controllers\Livewire;

use App\Http\Requests\Blade\StoreBladeAttachmentRequest;
use App\Models\FormSubmission;

class LivewireAttachmentsController
{
    public function __invoke()
    {
        return view('uploads.livewire.attachments');
    }
}
