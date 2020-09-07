<?php

namespace App\Http\Requests\Vue;

use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;
use Illuminate\Foundation\Http\FormRequest;

class StoreReactAttachmentsRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateMultipleMedia()
                ->minItems(2)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048)
            ]
        ];
    }
}
