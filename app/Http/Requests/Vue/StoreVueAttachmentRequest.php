<?php

namespace App\Http\Requests\Vue;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreVueAttachmentRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateSingleMedia()
                ->minSizeInKb(300)
                ->maxItemSizeInKb(2000),
            ],
        ];
    }
}
