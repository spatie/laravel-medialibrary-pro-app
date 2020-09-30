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
                ->maxItems(3)
                ->attribute('name', 'required')
                ->customProperty('extra_field', 'required|min:50'),
            ],

            'downloads' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->maxTotalSizeInKb(2048),
            ],
        ];
    }
}
