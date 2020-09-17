<?php

namespace App\Http\Requests\Livewire;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreLivewireCollectionRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'images' => [$this->validateMultipleMedia()
                //->minItems(1)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048)
                ->attribute('name', 'required'),
            ],

            'downloads' => [$this->validateMultipleMedia()
                //->minItems(2)
                ->maxItems(3)
                ->maxTotalSizeInKb(2048),
            ],

        ];
    }
}
