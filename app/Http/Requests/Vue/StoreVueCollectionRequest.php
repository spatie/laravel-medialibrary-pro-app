<?php

namespace App\Http\Requests\Vue;

use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;
use Illuminate\Foundation\Http\FormRequest;

class StoreVueCollectionRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'images' => ['required', $this->validateMultipleMedia()
                ->minItems(2)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048)
            ],
            'downloads' => ['required', $this->validateMultipleMedia()
                ->minItems(2)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048)
            ]
        ];
    }
}
