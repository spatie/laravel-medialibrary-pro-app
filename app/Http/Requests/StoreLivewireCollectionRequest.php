<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivewireCollectionRequest extends FormRequest
{
    public function rules()
    {
        return [
          //  'images.*.custom_properties.extra_field' => 'required|min:6',
        ];
    }
}
