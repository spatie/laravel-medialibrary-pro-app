<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSingleUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'media' => 'required|array',
            'media.*.uuid' => 'required|uuid',
            'media.*.order' => 'required|numeric',
            'media.*.name' => 'required|string',
            'media.*.thumbnail' => 'required|string',
            'media.*.custom_properties' => 'required|string',
        ];
    }
}
