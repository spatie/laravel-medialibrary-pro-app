<?php

namespace App\Http\Requests\Vue;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

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
                ->maxTotalSizeInKb(2048),
            ],
            'downloads' => ['required', $this->validateMultipleMedia()
                ->minItems(2)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048),
            ],
        ];
    }
}
