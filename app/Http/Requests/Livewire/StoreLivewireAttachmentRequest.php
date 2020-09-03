<?php

namespace App\Http\Requests\Livewire;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivewireAttachmentRequest extends FormRequest
{
    public function rules()
    {
        return [
          //  'images.*.custom_properties.extra_field' => 'required|min:6',
        ];
    }
}
