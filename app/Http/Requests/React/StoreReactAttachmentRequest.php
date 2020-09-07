<?php

namespace App\Http\Requests\Vue;

use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;
use Illuminate\Foundation\Http\FormRequest;

class StoreReactAttachmentRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateSingleMedia()
                ->minSizeInKb(50000)
                ->maxAttachmentSizeInKb(1)
            ]
        ];
    }
}
