<?php

namespace App\Http\Requests\Livewire;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreLivewireCollectionCustomPropertyRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'images' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->attribute('name', 'required|max:5')
                ->customProperty('extra_field', 'required'),
            ],
        ];
    }
}
