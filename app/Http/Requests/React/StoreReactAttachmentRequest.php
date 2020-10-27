<?php

namespace App\Http\Requests\React;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreReactAttachmentRequest extends FormRequest
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
