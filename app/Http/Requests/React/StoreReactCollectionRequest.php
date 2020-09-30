<?php

namespace App\Http\Requests\React;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreReactCollectionRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'images' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->maxTotalSizeInKb(2048)
                ->attribute('name', ['required', 'max:50']),
            ],
            'downloads' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->maxTotalSizeInKb(2048),
            ],
        ];
    }
}
