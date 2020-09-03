<?php

namespace App\Http\Requests\Livewire;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivewireAttachmentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', 'min:1']
        ];
    }
}
