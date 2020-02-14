<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSingleUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'avatar' => UploadRule::create()->singleFile(),
        ];
    }
}
