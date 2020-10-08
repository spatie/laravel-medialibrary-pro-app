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
            'images' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->itemName('required'),
            ],
            'downloads' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->maxTotalSizeInKb(2048),
            ],
        ];
    }
}
