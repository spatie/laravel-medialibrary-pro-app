<?php

namespace App\Http\Requests\React;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

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
                ->minSizeInKb(300)
                ->maxTotalSizeInKb(3072),
            ],
        ];
    }
}
