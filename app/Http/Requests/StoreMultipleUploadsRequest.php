<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleUploadsRequest extends FormRequest
{
    public function fieldName()
    {
        return 'media';
    }

    public function rules()
    {
        return [
            "{$this->fieldName()}.*.uuid" => 'required|uuid',
            "{$this->fieldName()}.*.order" => "required|numeric",
            "{$this->fieldName()}.*.name" => "required|string",
            "{$this->fieldName()}.*.thumbnail" => "required|string",
            "{$this->fieldName()}.*.custom_properties" => "array",
        ];
    }
}
