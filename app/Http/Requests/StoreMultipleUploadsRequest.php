<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleUploadsRequest extends FormRequest
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
            'media.*.custom_properties' => 'required|array',
            /* Custom validation rules. These should probably be configurable by the user from somewhere else */
            'media.*.custom_properties.tags' => 'required',
            'media.*.custom_properties.caption' => 'required',
        ];
    }
}
