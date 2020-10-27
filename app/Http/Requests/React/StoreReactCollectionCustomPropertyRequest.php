<?php

namespace App\Http\Requests\React;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreReactCollectionCustomPropertyRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'images' => [$this->validateMultipleMedia()
                ->maxItems(3)
                ->itemName('required|max:30')
                ->customProperty('extra_field', 'required|max:30'),
            ],
        ];
    }
}
