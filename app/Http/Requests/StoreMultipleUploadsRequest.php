<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleUploadsRequest extends FormRequest
{
    public function fieldName()
    {
        return 'single-media';
    }

    public function rules()
    {
        return [
            "{$this->fieldName()}.*.uuid" => 'required|uuid',
            "{$this->fieldName()}.*.order" => "required|numeric",
            "{$this->fieldName()}.*.name" => "required|string",
            "{$this->fieldName()}.*.thumbnail" => "required|string",
            //"{$this->fieldName()}.*.custom_properties" => "required|array",
            /* Custom validation rules. These should probably be configurable by the user from somewhere else */
           // "{$this->fieldName()}.*.custom_properties.tags" => "required",
           // "{$this->fieldName()}.*.custom_properties.caption" => "required",
        ];
    }
}
